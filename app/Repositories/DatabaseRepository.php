<?php

namespace App\Repositories;

use App\Models\Database;

class DatabaseRepository extends Repository
{
    public function __construct(Database $database)
    {
        $this->object = $database;
    }

    public function getAllByPage($limit) {
        return $this->object->orderBy('top', 'desc')
        ->orderBy('order', 'desc')
        ->orderBy('created_at', 'desc')
        ->paginate($limit);
    }

    public function getDatabasesByPage($keyword, $limit) {
        $fields = ['name', 'brief', 'content'];

		$objects = $this->object;
		foreach ($fields as $field) {
			foreach (($keywords = explode(' ', $keyword)) as $value) {
				if ($value === reset($keywords)) {
					$objects = $objects->orWhere($field, 'like', '%' . $value . '%');
				} else {
					$objects = $objects->where($field, 'like', '%' . $value . '%');
				}
			}
		}

		return $objects->paginate($limit);
    }
}
