<?php

namespace JSefton\MailingList\Commands;

use Illuminate\Console\Command;
use JSefton\MailingList\Models\MailingList;

class MailingListList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing-list:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Output a list of all mailing lists';

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
        $lists = MailingList::all(['id', 'name'])->toArray();
        $this->table(['ID', 'Name'], $lists);
    }
}
