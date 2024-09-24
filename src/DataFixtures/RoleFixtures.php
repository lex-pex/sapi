<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Enum\RoleType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();  // Faker for generating random data

        // Array of RoleType values
        $roleTypes = [
            RoleType::ITRole,
            RoleType::BirthRight,
            RoleType::Manager,
        ];

        // Create 10 sample roles
        for ($i = 0; $i < 10; $i++) {
            $role = new Role();
            $role->setName($faker->jobTitle); // Random job title for name
            $role->setRoleType($faker->randomElement($roleTypes)); // Random enum value

            $manager->persist($role); // Persist the entity
        }

        $manager->flush(); // Flush to save to the database
    }
}
