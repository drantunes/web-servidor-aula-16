<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Job {
    private $id;
    private $tipo;
    private $vaga;
    private $salario;
    private $descricao;
    private $empresa;
    private $site;
    private $tags;
    private $publicado;

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        return $this->$property = $value;
    }

    public static function lista()
    {
        return Cache::get('jobs') ?? [];
    }

    public static function get($id)
    {
        return Cache::get($id);
    }

    public function save()
    {
        $data = Cache::get('jobs') ?? [];
        array_push($data, $this);

        Cache::put('jobs', $data);
        Cache::put($this->id, $this);
    }

}