<?php

namespace App\Models\Repositories;

class HotelRepository extends Repository
{
    const TABLE = 'hotels';
    const COLUMNS = ["hotel_id", "hotel_name", "room_name", "state", "price", "currency"];

    public function saveData(array $data)
    {
        $this->db->insertMulti(self::TABLE, $data, self::COLUMNS);
    }

    public function getCheapestRooms(int $max_hotels): array
    {
        return $this->db->rawQuery('
            SELECT * FROM ( 
                SELECT ' . implode(', ', self::COLUMNS) . ', 
                @count := IF(@value = hotel_id, @count + 1, 1) AS count, 
                @value := hotel_id AS check_hotel_id 
                FROM hotels, (SELECT @count := 1, @value := NULL) a 
                ORDER BY hotel_id, price ASC ) a 
            WHERE a.count <= ' . $max_hotels . '
            ORDER BY price ASC');
    }
}