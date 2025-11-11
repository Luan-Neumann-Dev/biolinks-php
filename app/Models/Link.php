<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;

class Link extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    private function move($to): void
    {
        $order = $this->sort;
        $newOrder = $order + $to;

        $swapWith = $this->user->links()->where('sort', $newOrder)->first();

        $this->update(['sort' => $newOrder]);
        $swapWith->update(['sort' => $order]);
    }

    public function moveUp(): void
    {
        $this->move(-1);
    }

    public function moveDown(): void
    {
        $this->move(1);
    }
}
