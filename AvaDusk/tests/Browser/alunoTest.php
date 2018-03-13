<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class alunoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /*
    public function setUp()
    {
         $mes = date('M');
         $dia = date('d');
         $ano = date('Y');
         $diaAtual = '{$dia}-${mes}-{$ano}';

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->value('#usuario', 'proff1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->clickLink('SAE - Matemática: 5º ano')
                ->click('.agendamento')
                ->waitFor('.modal-content')
                ->value('#dtinicio', ${diaAtual})
                ->value('#dtfim', '01-04-2018')
                ->click('#btnEnviar')
                ->pause(7000)
                ;

        });
    }
    */
    public function tearDown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/sair');

        });
    }

    public function testAudioEstrangeiraEF_AVA383()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime_xpto')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprimario')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime3ano')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_d9h8')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunolliinha002')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'silva_nnsd')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina){
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');
        });
    }

    public function testArraseEnemEF_AVA377()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime_xpto')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprimario')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime3ano')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_d9h8')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunolliinha002')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'silva_nnsd')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->assertDontSee('SAE: Arrase no Enem')
                ->visit('/sair');
        });
    }

    public function testArraseEnemEM_AVA375()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_5zt7')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.geral.arraseNoEnem', function ($Disciplina) {
                    $Disciplina->clickLink('SAE - Arrase no Enem');
                })
                ->assertSee('SAE: Arrase no Enem (2018)')
                ->assertSee('SAE: Arrase no Enem (2017)')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'topoem2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.geral.arraseNoEnem', function ($Disciplina) {
                    $Disciplina->clickLink('SAE - Arrase no Enem');
                })
                ->assertSee('SAE: Arrase no Enem (2018)')
                ->assertSee('SAE: Arrase no Enem (2017)')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'prime_dduriy')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.geral.arraseNoEnem', function ($Disciplina) {
                    $Disciplina->clickLink('SAE - Arrase no Enem');
                })
                ->assertSee('SAE: Arrase no Enem (2018)')
                ->assertSee('SAE: Arrase no Enem (2017)')
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'prime_10ce')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.geral.arraseNoEnem', function ($Disciplina) {
                    $Disciplina->clickLink('SAE - Arrase no Enem');
                })
                ->assertSee('SAE: Arrase no Enem (2018)')
                ->assertSee('SAE: Arrase no Enem (2017)')
                ->visit('/sair');
        });
    }

    public function testDisciplinaAzulVivoEM_AVA366()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'topoem2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25142', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaAberta"');
                });


        });
    }

    public function testDisciplinaAzulVivoEF_AVA373()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25106', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaAberta"');
                });


        });
    }

    public function testDisciplinaAzulFoscoEM_AVA374()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_5zt7')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25120', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaVencida"');
                });


        });
    }

    public function testDisciplinaAzulFoscoEF_AVA370_AVA438()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#28713', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaVencida"');
                });


        });
    }

    public function testLoginAtivoEF_AVA353()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#inputSerie', function ($comboUser) {
                    $comboUser->assertSee('5º ano');
                });


        });
    }

    public function testLoginAtivoEM_AVA354()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'prime_10ce')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#inputSerie', function ($comboUser) {
                    $comboUser->assertSee('Extensivo Mega');
                });


        });
    }

    public function testLoginInativoAlunoEF_AVA344()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'nnnneeeewwwwlogin')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.messi-content', function ($nomeUser) {
                    $nomeUser->assertSee('Usuário não cadastrado!');
                });;


        });
    }

    public function testLoginInativoAlunoEM_AVA344()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'prine_doujix')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.messi-content', function ($nomeUser) {
                    $nomeUser->assertSee('Usuário não cadastrado!');
                });;


        });
    }

}
