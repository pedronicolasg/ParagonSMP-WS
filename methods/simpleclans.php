<?php
require_once 'conn.php';

class Simpleclans
{
  private $conn;
  private $utils;

  public function __construct($conn)
  {
    $this->conn = $conn;
    $this->utils = new Utils($conn);
  }

  public function getClans($verified = true)
  {
    $verifiedValue = $verified ? 1 : 0;
    $query = "SELECT name, tag, color_tag, verified,
    REPLACE(packed_allies, '|', ', ') as packed_allies,
    REPLACE(packed_rivals, '|', ', ') as packed_rivals,
    LEFT(description, 35) as short_description,
    (SELECT COUNT(*) FROM sc_kills WHERE attacker_tag = sc_clans.tag) AS total_kills
    FROM sc_clans
    WHERE verified = :verified
    ORDER BY total_kills DESC";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':verified', $verifiedValue, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getClanInfo($identifier, $fields = [], $type = 'tag')
  {
    $validFields = ['name', 'tag', 'color_tag', 'verified', 'packed_bb', 'packed_allies', 'packed_rivals', 'description'];
    $defaultFields = ['name', 'tag', 'color_tag', 'verified', 'packed_bb', 'description'];
    $selectedFields = empty($fields) ? implode(', ', $defaultFields) : implode(', ', array_intersect($fields, $validFields));

    $query = "SELECT $selectedFields,
    REPLACE(packed_allies, '|', ', ') as allies,
    REPLACE(packed_rivals, '|', ', ') as rivals,
    (SELECT COUNT(*) FROM sc_players WHERE tag = sc_clans.tag) AS total_members,
    (SELECT COUNT(*) FROM sc_kills WHERE attacker_tag = sc_clans.tag) AS total_kills
    FROM sc_clans
    WHERE $type = :identifier";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':identifier', $identifier);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getClanMembers($tag)
  {
    $allowedFields = [
      'bt.name',
      'bt.id as uuid',
      'bt.kills',
      'bt.deaths',
      'bt.ties',
      'bt.max_streak',
      'bt.rating',
      'bt.max_rating',
      'bt.max_kd_ratio',
      'sc.tag',
      'sc.leader'
    ];

    $fieldList = implode(', ', $allowedFields);

    $query = "SELECT $fieldList
              FROM bt_pvp_overall bt
              LEFT JOIN sc_players sc ON bt.id = sc.uuid
              WHERE sc.tag = :tag
              ORDER BY sc.leader DESC, bt.name ASC";

    $stmt = $this->conn->prepare($query);
    $stmt->execute(['tag' => $tag]);

    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($members) {
      foreach ($members as &$member) {
        $member['skin'] = $this->utils->getPlayerSkin($member['uuid']);
      }
    }

    return $members;
  }
}
