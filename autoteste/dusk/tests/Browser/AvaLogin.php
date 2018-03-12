<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class AvaLogin extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
    public function tearDown()
    {  $this->browse(function (Browser $browser) {
            $browser->visit('/sair');

          });
    }
    
    public function testAVA494PlataformaProfessorMaisDeUmaTurma()
      {
          $this->browse(function (Browser $browser) {
              $browser->visit('/')
                      ->maximize()
                      ->value('#usuario','profef1')
                      ->value('#senha','123')
                      ->click('#btnEntrar')
                      ->whenAvailable('#dLabel', function ($nomeUser) {
                            $nomeUser->assertSee('PROFESSOR EF1');
                      });

                $browser->select('#inputTurma','db5657a790210cd0e7cde37167ae7a05')
                        ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 1º ano')
                        ->assertSee('FI - Videoaulas/Material Impresso: 1º ano')
                        ->assertSee('Áudios - Língua Estrangeira')
                        ;
                
                $browser->select('#inputTurma','073a32ae9b9ba5a8cf534a4461333cdb')
                        ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 2º ano')
                        ->assertSee('FI - Videoaulas/Material Impresso: 2º ano')
                        ->assertSee('Áudios - Língua Estrangeira')
                        ;
               
                $browser->select('#inputTurma','6c1af62ecf1b17f115b45ec9c92e7fa1')
                        ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 3º ano')
                        ->assertSee('FI - Videoaulas/Material Impresso: 3º ano')
                        ->assertSee('Áudios - Língua Estrangeira')
                        ;
               
                $browser->select('#inputTurma','e807d0436c275e784449b676f7d8787f')
                        ->assertSee('SAE - Matemática: 4º ano')
                        ->assertSee('SAE - Língua Portuguesa: 4º ano')
                        ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 4º ano')
                        ->assertSee('FI - Videoaulas/Material Impresso: 4º ano')
                        ->assertSee('Áudios - Língua Estrangeira')
                        ;
               
                $browser->select('#inputTurma','0f289f5fa00367ecc3d35b38750528a9')
                        ->assertSee('SAE - Língua Portuguesa: 5º ano')
                        ->assertSee('SAE - Matemática: 5º ano')
                        ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 5º ano')
                        ->assertSee('FI - Videoaulas/Material Impresso: 5º ano')
                        ->assertSee('Áudios - Língua Estrangeira')
                        ;
               
               
          });
          
      }



      public function testExample()
      {
          $this->browse(function (Browser $browser) {
            $browser->visit('/')
                      ->assertSee('Portal AVA');

          });
      }

}
