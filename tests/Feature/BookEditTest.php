<?php

namespace Tests\Feature;

use App\Models\book;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BookEditTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('books', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('books');

        parent::tearDown();
    }

    public function test_book_can_be_edited_and_updated(): void
    {
        $book = book::create([
            'title' => 'Judul Lama',
            'author' => 'Penulis Lama',
            'publisher' => 'Penerbit Lama',
            'stock' => 2,
        ]);

        $this->get("/books/edit/{$book->id}")
            ->assertOk()
            ->assertSee('Judul Lama');

        $this->put("/books/{$book->id}", [
            'title' => 'Judul Baru',
            'author' => 'Penulis Baru',
            'publisher' => 'Penerbit Baru',
            'stock' => 5,
        ])->assertRedirect('/books');

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Judul Baru',
            'author' => 'Penulis Baru',
            'publisher' => 'Penerbit Baru',
            'stock' => 5,
        ]);
    }
}
