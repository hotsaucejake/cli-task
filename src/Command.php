<?php namespace hotsaucejake;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand {
   
   protected $database;
   
   public function __construct(DatabaseAdapter $database)
   {
      $this->database = $database;
      
      parent::__construct();
   }
   
   protected function showTasks(OutputInterface $output)
   {
      if (! $tasks = $this->database->fetchAll('tasks'))
      {
         return $output->writeln('<info>Congratulations!  You are free of tasks.');
      }
      
      $table = new Table($output);
      
      $table->setHeaders(['ID', 'Description'])
            ->setRows($tasks)
            ->render();
   }
   
}