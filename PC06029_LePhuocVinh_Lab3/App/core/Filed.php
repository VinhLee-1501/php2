<?php

namespace App\core;

class Filed
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_NUMBER = 'number';

    public string $type;
    public string $attributes;

    public function __construct(string $attributes)
    {
        $this->type = self::TYPE_TEXT;
        $this->attributes = $attributes;
    }

    public function __toString()
    {
        return sprintf('
        <div class="form-control">
        <label>%s</label>
        <input type="%s" name="%s">
        </div>
        ',
            $this->getLabel($this->attributes),
            $this->type,
            $this->attributes);
        // TODO: Implement __toString() method.
    }

    public function passwordFiled()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function labels(): array
    {
        return [
            'fullName' => 'Full name',
            'email' => 'Your email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        ];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }
}