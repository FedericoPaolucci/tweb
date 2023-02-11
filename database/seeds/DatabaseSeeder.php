<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
                ['name' => 'Utente',
                'surname' => 'Numerouno',
                'username' => 'blogblog',
                'email' => 'blogblog@blog.com',
                'password' => Hash::make('5G7EVRKq'),
                'birthday' => Carbon::createFromDate(1980, 10, 10),
                'role' => 'user',
                'profile' => 'Sono il primo utente ad essersi registrato!',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['name' => 'Staff',
                'surname' => 'Cognomestaff',
                'username' => 'staffstaff',
                'email' => 'blogstaff@blog.com',
                'password' => Hash::make('5G7EVRKq'),
                'birthday' => Carbon::createFromDate(1990, 10, 10),
                'role' => 'staff',
                'profile' => 'STAFF',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['name' => 'Admin',
                'surname' => 'Cognomeadmin',
                'username' => 'adminadmin',
                'email' => 'blogadmin@blog.com',
                'password' => Hash::make('5G7EVRKq'),
                'birthday' => Carbon::createFromDate(1970, 10, 10),
                'role' => 'admin',
                'profile' => 'ADMIN',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['name' => 'Mario',
                'surname' => 'Rossi',
                'username' => 'mariorossi',
                'email' => 'blogrossi@blog.com',
                'password' => Hash::make('12345678'),
                'birthday' => Carbon::createFromDate(1980, 1, 2),
                'role' => 'user',
                'profile' => 'Sono Mario Rossi. Il secondo utente del sito...',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['name' => 'Luigi',
                'surname' => 'Rossi',
                'username' => 'luigirossi',
                'email' => 'blogluigi@blog.com',
                'password' => Hash::make('12345678'),
                'birthday' => Carbon::createFromDate(1981, 1, 4),
                'role' => 'user',
                'profile' => 'Questo è il mio profilo! Ho creato anche un blog!',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['name' => 'Federico',
                'surname' => 'Paolucci',
                'username' => 'federico',
                'email' => 'blogfede@blog.com',
                'password' => Hash::make('12345678'),
                'birthday' => Carbon::createFromDate(1999, 5, 9),
                'role' => 'user',
                'profile' => 'Sono l utente che ha scritto il codice del sito!',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('blogs')->insert([
                ['id_owner' => 1,
                'subject' => 'Primo blog del sito',
                'about' => 'Questo è il primo blog del sito, scritto dal sottoscritto!',
                'created_at' => date("Y-m-d H:i:s")],
                ['id_owner' => 4,
                'subject' => 'Cosa ho fatto oggi',
                'about' => 'Questo blog sarà dedicato a descrivere le mie attività quotidiane.',
                'created_at' => date("Y-m-d H:i:s")],
                ['id_owner' => 5,
                'subject' => 'I film che ho visto',
                'about' => 'Cosa ho visto al cinema?',
                'created_at' => date("Y-m-d H:i:s")],
                ['id_owner' => 6,
                'subject' => 'Codice del sito',
                'about' => 'Ho scritto il codice del sito!',
                'created_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('posts')->insert([
                ['id_writer' => 1,
                'id_blog_owner' => 1,
                'body' => 'Questo dovrebbe essere il primo post del sito! Sono il primo!',
                'posted_at' => date("Y-m-d H:i:s")],
                ['id_writer' => 4,
                'id_blog_owner' => 4,
                'body' => 'Oggi, mi sono svegliato e ho scritto questo Post!',
                'posted_at' => date("Y-m-d H:i:s")],
                ['id_writer' => 5,
                'id_blog_owner' => 5,
                'body' => 'L ultimo film che ho visto è stato Avatar 2, devo dire che mi è piaciuto. Seguirà recensione...',
                'posted_at' => date("Y-m-d H:i:s")],
                ['id_writer' => 6,
                'id_blog_owner' => 6,
                'body' => 'Ho scritto il codice del sito. Anche della pagina che stai visualizzando in questo momento. A destra è presente il form per inserire il tuo post in questo blog! Segui le regole se non vuoi essere moderato da un membro dello staff!',
                'posted_at' => date("Y-m-d H:i:s")],
                ['id_writer' => 1,
                'id_blog_owner' => 6,
                'body' => 'Staff! Prova ad eliminare questo POST!',
                'posted_at' => date("Y-m-d H:i:s")]
        ]);

        DB::table('friendships')->insert([
                ['id_user1' => 1,
                'id_user2' => 4,
                'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['id_user1' => 1,
                'id_user2' => 6,
                'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
                ['id_user1' => 4,
                'id_user2' => 6,
                'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        ]);

        DB::table('messages')->insert([
                ['id_sender' => 1,
                'id_sent_to' => 6,
                'body' => 'Primo messaggio!',
                'type' => 'normal',
                'viewed' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }

}
