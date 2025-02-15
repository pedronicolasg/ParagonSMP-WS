<?php
require_once 'conn.php';

class Utils
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public static function metaDataRemover($item)
  {
    return preg_replace('/&[0-9a-fk-or]/i', '', $item);
  }

  private function getPlayerName($uuid){
    $query = "SELECT name FROM sc_players WHERE uuid = :uuid";
    $stmt = $this->conn->prepare($query);
    $stmt->execute(['uuid' => $uuid]);
    return $stmt->fetchColumn();
  }

  public function getPlayerInfo($identifier = null, $fields = [], $type = 'id')
  {
    $allowedFields = [
      'bt.name',
      'bt.id as uuid',
      'bt.kills',
      'bt.deaths',
      'bt.ties',
      'bt.rating',
      'bt.max_rating',
      'bt.max_streak',
      'bt.max_kd_ratio',
      'sc.tag',
      'sc.leader'
    ];

    if (empty($fields)) {
      $fieldList = implode(', ', $allowedFields);
    } else {
      $fieldList = implode(', ', array_intersect($fields, $allowedFields));
    }

    $query = "SELECT $fieldList
              FROM bt_pvp_overall bt
              LEFT JOIN sc_players sc ON bt.id = sc.uuid";

    $params = [];
    
    if ($identifier !== null) {
      $query .= " WHERE bt.$type = :identifier";
      $params['identifier'] = $identifier;
    } else {
      $query .= " WHERE 1=1";
    }

    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);
    $player = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($player) {
      $player['skin'] = $this->getPlayerSkin($player['uuid']);
    }

    return $player;
  }

  public function getPlayerSkin($uuid)
  {
    $query = "SELECT skin_identifier, skin_variant FROM sr_players WHERE uuid = :uuid";
    $stmt = $this->conn->prepare($query);
    $stmt->execute(['uuid' => $uuid]);
    $skinData = $stmt->fetch(PDO::FETCH_ASSOC);

    $skinUrl = $skinData ? self::formatIMGUr($skinData['skin_identifier']) : $this->getSkinUrl($uuid);

    return $skinUrl;
  }

  private function getSkinUrl($uuid)
  {
    $username = $this->getPlayerName($uuid);
    if (!$username) {
      return "assets/img/defaultskin.png";
    }

    $apiUrl = "https://api.mojang.com/users/profiles/minecraft/{$username}";
    $response = @file_get_contents($apiUrl);

    if ($response === false) {
      return "assets/img/defaultskin.png";
    }

    $data = json_decode($response, true);
    if (!isset($data['id'])) {
      return "assets/img/defaultskin.png";
    }

    $uuid = $data['id'];
    return "https://crafatar.com/skins/{$uuid}";
  }

  private static function formatIMGUr($url)
  {
    $parsedUrl = parse_url($url);

    if (!isset($parsedUrl['host']) || strpos($parsedUrl['host'], 'imgur.com') === false) {
      return null;
    }

    if (preg_match('/^https:\/\/i\.imgur\.com\/.+\.(png|jpg|jpeg|gif)$/i', $url)) {
      return $url;
    }

    preg_match('/(?:imgur\.com\/([a-zA-Z0-9]+)|\/a\/([a-zA-Z0-9]+))/', $url, $matches);

    if (!isset($matches[1]) && !isset($matches[2])) {
      return null;
    }

    $imageId = $matches[1] ?? $matches[2];
    return "https://i.imgur.com/{$imageId}.png";
  }
}
