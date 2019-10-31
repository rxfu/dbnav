<?php

namespace App\Repositories;

use App\Models\Database;

class DatabaseRepository extends Repository
{
    public function __construct(Database $database)
    {
        $this->object = $database;
    }

    public function getAllByPage($limit)
    {
        return $this->object->orderBy('top', 'desc')
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    public function getDatabasesByPage($limit = 10, $keyword = null, $letters = null, $subject = null, $type = null, $language = null, $status = null)
    {
        $fields = ['name', 'brief', 'content'];
        $objects = $this->object;

        if (!is_null($keyword)) {
            foreach ($fields as $field) {
                foreach (($keywords = explode(' ', $keyword)) as $value) {
                    if ($value === reset($keywords)) {
                        $objects = $objects->orWhere($field, 'LIKE', '%' . $value . '%');
                    } else {
                        $objects = $objects->where($field, 'LIKE', '%' . $value . '%');
                    }
                }
            }
        }

        if (!is_null($letters)) {
            $letters = is_array($letters) ? $letters : array($letters);

            foreach ($letters as $letter) {
                if ('number' === $letter) {
                    $objects = $objects->orWhere('slug', 'REGEXP', '^[0-9]');
                } else {
                    $objects = $objects->orWhere('slug', 'LIKE', $letter . '%');
                }
            }
        }

        if (!is_null($subject)) {
            $subject = is_array($subject) ? $subject : array($subject);

            $objects = $objects->whereHas('subjects', function ($q) use ($subject) {
                $q->whereIn('subject_id', $subject);
            });
        }

        if (!is_null($type)) {
            $type = is_array($type) ? $type : array($type);

            $objects = $objects->whereHas('types', function ($q) use ($type) {
                $q->whereIn('type_id', $type);
            });
        }

        if (!is_null($language)) {
            $language = is_array($language) ? $language : array($language);

            $objects = $objects->whereHas('languages', function ($q) use ($language) {
                $q->whereIn('language_id', $language);
            });
        }

        if (!is_null($status)) {
            $status = is_array($status) ? $status : array($status);

            $objects = $objects->whereIn('status', $status);
        }

        return $objects->orderBy('top', 'desc')
            ->orderBy('order', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }
}
