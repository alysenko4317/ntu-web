<?php

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function roomOptions(): array
{
    return [
        'large' => 'Велика зала',
        'middle' => 'Середня зала',
        'small' => 'Мала зала',
    ];
}

function roomName(?string $room): string
{
    $rooms = roomOptions();

    return $rooms[$room] ?? 'Не вказано';
}

function selected(string $currentValue, string $expectedValue): string
{
    return $currentValue === $expectedValue ? ' selected' : '';
}

function fieldValue(array $source, string $key): string
{
    return e($source[$key] ?? '');
}
