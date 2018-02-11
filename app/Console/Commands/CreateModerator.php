<?php namespace App\Console\Commands;

use App\Models\User\Moderator;
use Illuminate\Console\Command;

class CreateModerator extends Command
{
    /** @var string $signature */
    protected $signature = 'create:moderator';

    /** @var string $description */
    protected $description = 'create moderator with giving attributes';

    public function handle()
    {
        $name = $this->ask('Set name');
        $email = $this->ask('Set email');
        $password = $this->secret('Set password');
        $confirmation = $this->secret('Confirm password');

        if ($password !== $confirmation) {
            $this->alert('Password confirmation invalid');

            exit;
        }

        try {
            $moderator = Moderator::create([
                'name'     => $name,
                'email'    => $email,
                'password' => bcrypt(trim($password))
            ]);

            $this->info('Moderator creation success. ID#' . $moderator->id);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}