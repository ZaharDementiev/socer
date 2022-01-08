<?php

namespace App\Helpers;

final class ValidatedModel
{
    private object  $objectFields;

    public function __construct(
        private array $validatedFields
    ) {
        $this->objectFields = (object) $this->validatedFields;
    }

    public function getObject(): object
    {
        return $this->objectFields;
    }

    public function getArray(): array
    {
        return $this->validatedFields;
    }
}
