<?php

namespace JSefton\MailingList\Commands;

use Illuminate\Console\Command;
use JSefton\MailingList\Models\MailingList;

class MailingListCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing-list:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mailing list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Enter a name for the mailing list you wish to create');
        $mailingList = MailingList::create(['name' => $name]);

        $this->info('Mailing list created with ID: ' . $mailingList->id);
    }
}
