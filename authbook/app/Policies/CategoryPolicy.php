<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
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

    public function view(User $user, Category $category): bool
    {
        return true; // semua user yang login boleh melihat (admin, staff, viewer)
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isStaff();
    }

    public function update(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->isStaff();
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isAdmin(); // dipakai bulk delete Filament
    }

    public function restore(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }

    public function restoreAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}
