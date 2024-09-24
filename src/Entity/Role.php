<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\RoleType;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
#[ApiResource(
    paginationEnabled: true,
    paginationItemsPerPage: 5
)]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'partial', 'roleType' => 'exact'])]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'string', enumType: RoleType::class)]
    private RoleType $roleType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRoleType(): RoleType
    {
        return $this->roleType;
    }

    public function setRoleType(RoleType $roleType): self
    {
        $this->roleType = $roleType;
        return $this;
    }
}
