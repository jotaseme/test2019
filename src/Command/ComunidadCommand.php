<?php

namespace App\Command;

use App\Entity\Municipio;
use App\Entity\Provincia;
use App\Services\ProvinciasServiceInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ComunidadCommand extends Command
{
    protected static $defaultName = 'test:show:comunidad';

    /** @var  ProvinciasServiceInterface */
    private $proviciasService;

    /**
     * ComunidadCommand constructor.
     * @param ProvinciasServiceInterface $proviciasService
     */
    public function __construct(ProvinciasServiceInterface $proviciasService)
    {
        parent::__construct();
        $this->proviciasService = $proviciasService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Escribe en consola una lista indentada de los nombres de provincia y municipio que se 
            encuentren en la comunidad facilitada por parametro')
            ->addArgument('comunidad', InputArgument::REQUIRED, 'Comunidad');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $provincias = $this->proviciasService->getAllByNombreDeComunidad($input->getArgument('comunidad'));
        $io = new SymfonyStyle($input, $output);
        /** @var Provincia $provincia */
        foreach ($provincias as $provincia)
        {
            $io->title($provincia->getProvincia());
            /** @var Municipio $municipio */
            foreach ($provincia->getMunicipios() as $municipio){
                $io->listing([$municipio->getNombre()]);
            }
            $io->newLine();
        }
    }
}