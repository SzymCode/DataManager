<?php

namespace App\Contracts;


interface ContactShouldReceiveFields
{
    public function getId(): int;
    public function getUserId(): int;
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getEmail(): string;
    public function getPersonalPhone(): string;
    public function getWorkPhone(): string;
    public function getAddress(): string;
    public function getBirthday(): string;
    public function getRole(): string;
    public function getContactGroups(): array|null;
}
