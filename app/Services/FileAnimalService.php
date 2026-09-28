<?php

namespace App\Services;

use App\Contracts\AnimalServiceInterface;
use Illuminate\Support\Facades\Storage;

class FileAnimalService implements AnimalServiceInterface
{
    // Nombre del archivo donde se almacenarán los animales
    private string $file = 'animals.json';

    // Obtiene todos los animales almacenados en el archivo JSON
    private function getAnimals(): array
    {
        // Si el archivo no existe, retorna un arreglo vacío
        if (!Storage::disk('local')->exists($this->file)) {
            return [];
        }

        // Lee el contenido del archivo
        $json = Storage::disk('local')->get($this->file);

        // Convierte el JSON a un arreglo asociativo
        return json_decode($json, true) ?? [];
    }

    // Guarda el arreglo de animales en el archivo JSON
    private function saveAnimals(array $animals): void
    {
        Storage::disk('local')->put(
            $this->file,
            json_encode($animals, JSON_PRETTY_PRINT)
        );
    }

    // Retorna todos los animales almacenados
    public function all(): array
    {
        return $this->getAnimals();
    }

    // Busca un animal por su ID
    public function find(int|string $id): array
    {
        $animals = $this->getAnimals();

        foreach ($animals as $animal) {

            if ($animal['id'] == $id) {
                return $animal;
            }

        }

        throw new \Exception("El animal con ID {$id} no fue encontrado.");
    }

    // Crea un nuevo animal y lo guarda en el archivo
    public function create(array $data): array
    {
        $animals = $this->getAnimals();

        $lastId = empty($animals)
            ? 0
            : max(array_column($animals, 'id'));

        $newAnimal = [
            'id' => $lastId + 1,
            'name' => $data['name'],
            'species' => $data['species'],
            'age' => $data['age']
        ];

        $animals[] = $newAnimal;

        $this->saveAnimals($animals);

        return $newAnimal;
    }

    // Actualiza un animal existente
    public function update(int|string $id, array $data): bool
    {
        $animals = $this->getAnimals();

        foreach ($animals as &$animal) {

            if ($animal['id'] == $id) {

                $animal = array_merge($animal, $data);

                $this->saveAnimals($animals);

                return true;
            }

        }

        throw new \Exception("El animal con ID {$id} no fue encontrado.");
    }

    // Elimina un animal del archivo
    public function delete(int|string $id): bool
    {
        $animals = $this->getAnimals();

        foreach ($animals as $index => $animal) {

            if ($animal['id'] == $id) {

                unset($animals[$index]);

                $this->saveAnimals(array_values($animals));

                return true;
            }

        }

        throw new \Exception("El animal con ID {$id} no fue encontrado.");
    }

    // Reinicia el archivo de animales
    public function reset(): void
    {
        $this->saveAnimals([]);
    }
}