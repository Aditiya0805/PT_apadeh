<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    /**
     * Get the category that owns this product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Format the product price as Indonesian Rupiah.
     */
    public function formattedPrice(): string
    {
        return 'Rp '.number_format((float) $this->price, 0, ',', '.');
    }

    /**
     * Get the public URL for the stored product image.
     */
    public function imageUrl(): string
    {
        if ($this->image === null || ! Storage::disk('public')->exists($this->image)) {
            return asset('images/products/placeholder.svg');
        }

        return Storage::disk('public')->url($this->image);
    }
}
