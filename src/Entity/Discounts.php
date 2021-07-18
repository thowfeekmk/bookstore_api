<?php

namespace App\Entity;

use App\Repository\DiscountsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscountsRepository::class)
 */
class Discounts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $discount_type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $category_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $book_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $percentage;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $discount_for;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $end_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $min_quantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $apply_other_discount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscountType(): ?string
    {
        return $this->discount_type;
    }

    public function setDiscountType(string $discount_type): self
    {
        $this->discount_type = $discount_type;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function setBookId(?int $book_id): self
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    public function setPercentage(?int $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }

    public function getDiscountFor(): ?string
    {
        return $this->discount_for;
    }

    public function setDiscountFor(string $discount_for): self
    {
        $this->discount_for = $discount_for;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMinQuantity(): ?int
    {
        return $this->min_quantity;
    }

    public function setMinQuantity(?int $min_quantity): self
    {
        $this->min_quantity = $min_quantity;

        return $this;
    }

    public function getApplyOtherDiscount(): ?bool
    {
        return $this->apply_other_discount;
    }

    public function setApplyOtherDiscount(bool $apply_other_discount): self
    {
        $this->apply_other_discount = $apply_other_discount;

        return $this;
    }
}
