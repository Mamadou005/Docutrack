<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qui peuvent être remplis (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // On permet de remplir le rôle
    ];

    /**
     * Les attributs à cacher pour la sérialisation.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs à caster.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Vérifie si l'utilisateur est un Administrateur.
     * Utile pour protéger les routes et changer l'affichage.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Relation : Un utilisateur peut posséder plusieurs documents.
     * (C'est la relation 1:N de ton diagramme de classe)
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

//$user = App\Models\User::create([
//    'name' => 'Admin DocuTrack',
//    'email' => 'admin@test.com',
//    'password' => Hash::make('password'), // Ton mot de passe sera: password
//    'role' => 'admin'
//]);
