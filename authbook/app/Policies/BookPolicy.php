<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    /**
     * Admin: semua akses.
     * Staff: view, create, edit (tanpa delete).
     * Viewer: hanya view.
     */

    public function viewAny(User $user): bool
    {
        return true; // semua user yang login boleh melihat (admin, staff, viewer)
    }

    public function view(User $user, Book $book): bool
    {
        return true; // semua user yang login boleh melihat (admin, staff, viewer)
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isStaff();
    }

    public function update(User $user, Book $book): bool
    {
        return $user->isAdmin() || $user->isStaff();
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->isAdmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isAdmin(); // dipakai bulk delete Filament
    }

    public function restore(User $user, Book $book): bool
    {
        return $user->isAdmin();
    }

    public function restoreAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return $user->isAdmin();
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}
