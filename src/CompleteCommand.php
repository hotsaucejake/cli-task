<?php namespace hotsaucejake;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command {
   
   public function configure()
   {
      $this->setName('complete')
           ->setDescription('Complete and remove task by ID.')
           ->addArgument('id', InputArgument::REQUIRED);
   }
   
   public function execute(InputInterface $input, OutputInterface $output)
   {
      $id = $input->getArgument('id');
      
      $this->database->query(
         'DELETE FROM tasks WHERE id = :id',
         compact('id')
      );
      
      $output->writeln('<info>Task completed!</info>');
      
      $this->showTasks($output);
   }
   
}