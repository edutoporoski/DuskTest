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

    public function testInformarErroVideoEF_AVA409()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar');
        });
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/curso/sae-lingua-inglesa-9-ordm-ano?turmaID=0901eaf47373a40e6c2c071560277ba1')
                ->pause(2000)
                ->clickLink('1. It has been fun!')
                ->pause(1000)
                ->clickLink('Questão')
                ->pause(1000)
                ->clickLink('Informar Erro')
                ->pause(1000)
                ->assertSee('Você tem certeza que deseja informar que ocorreu um erro')
                ->click('.btn.btn-success')
                ->assertSee('Informar erro')
                ->value('#emailreclamante', 'erros@saedigital.com.rb')
                ->value('#descricaoerro', 'Teste de envio de erro da plataforma adaptativa')
                ->click('#btnEnviaErro')
                ->pause(2000)
                ->assertSee('Selecione um tipo de problema.')

            ;





        });
    }

    public function testInformarErroVideoEM_AVA408()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'sivo_jvup')
                ->value('#senha', '123')
                ->click('#btnEntrar');
        });
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/curso/sae-fisica-em-1-ordf-serie?turmaID=ad8321886041b896f70b420cb3305fdb')
                ->pause(2000)
                ->clickLink('1. Cinemática vetorial - Frente A')
                ->pause(1000)
                ->click('.nome a')
                ->pause(1000)
                ->clickLink('Informar Erro')
                ->pause(1000)
                ->assertSee('Você tem certeza que deseja informar que ocorreu um erro')
                ->click('.btn.btn-success')
                ->assertSee('Informar erro')
                ->value('#emailreclamante', 'erros@saedigital.com.rb')
                ->value('#descricaoerro', 'Teste de envio de erro da plataforma adaptativa')
                ->click('#btnEnviaErro')
                ->pause(2000)
                ->assertSee('Selecione um tipo de problema.')

                ;





        });
    }

    public function testInformarErroDisciplinaEM_AVA404()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'sivo_jvup')
                ->value('#senha', '123')
                ->click('#btnEntrar');
        });
        $this->browse(function (Browser $browser) {
            $browser
                ->clickLink('Entrar')
                ->clickLink('1. The most extreme places to live')
                ->pause(1000)
                ->clickLink('Questão')
                ->pause(1000)
                ->clickLink('Informar Erro')
                ->pause(1000)
                ->assertSee('Você tem certeza que deseja informar que ocorreu um erro')
                ->click('.btn.btn-success')
                ->assertSee('Informar erro')
                ->value('#emailreclamante', 'erros@saedigital.com.rb')
                ->click('#menu1')
                ->keys('#menu1',['{down}'],['{Enter}'])
                ->value('#descricaoerro', 'Teste de envio de erro da plataforma adaptativa')
                ->click('#btnEnviaErro')
                ->whenAvailable('.swal2-modal.swal2-show', function ($Modal) {
                    $Modal->pause(8000)
                    ;
                })
                ->assertSee('Em até 72 horas você receberá uma resposta.')
                ->click('.swal2-confirm.swal2-styled')
            ;

        });
    }

    public function testInformarErroDisciplinaEF_AVA405()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar');
        });
        $this->browse(function (Browser $browser) {
            $browser
                ->clickLink('Entrar')
                ->clickLink('4. Chinese New Year ')
                ->pause(1000)
                ->clickLink('Questão')
                ->pause(1000)
                ->clickLink('Informar Erro')
                ->pause(1000)
                ->assertSee('Você tem certeza que deseja informar que ocorreu um erro')
                ->click('.btn.btn-success')
                ->assertSee('Informar erro')
                ->value('#emailreclamante', 'erros@saedigital.com.rb')
                ->click('#menu1')
                ->keys('#menu1',['{down}'],['{Enter}'])
                ->value('#descricaoerro', 'Teste de envio de erro da plataforma adaptativa')
                ->click('#btnEnviaErro')
                ->whenAvailable('.swal2-modal.swal2-show', function ($Modal) {
                    $Modal->pause(8000)
                    ;
                })
                ->assertSee('Em até 72 horas você receberá uma resposta.')
                ->click('.swal2-confirm.swal2-styled')
                ;

        });
    }

    public function testRelatorioDiario_AVA414()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->pause(2000);
            $browser->visit('/relatorios')
                ->clickLink('Relatório - Diário')
                ->assertSee('Relatório Diário')
                ->value('.form-control', '01-01-2018')
//                ->value('.form-control','31-12-2018')
//                ->click('.btn.btn-primary')
                ->keys('.form-control', ['{Tab}'], '31-12-2018')
                ->click('.btn.btn-primary')
                ->assertSee('Exportar CSV')
                ->assertSee('Exportar Excel')
                ->assertSee('Exportar Pdf')
                ->assertSee('16/01/2018 - Terça-Feira')
                ->assertSee('SAE - Língua Portuguesa - 9º ano: 1º Bimestre')
                ->assertSee('Gosto se discute?')
                ->assertSee('O fim da guerra e suas marcas para o mundo');


        });
    }

    public function testRelatorioGeral_AVA421()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->pause(2000);
            $browser->visit('/relatorios')
                ->clickLink('Relatório - Geral')
                ->assertSee('Coeficiente Acadêmico*')
                ->assertSee('Relatório Desempenho Geral')
                ->assertSee('SAE - Química: 9º ano')
                ->assertSee('SAE - Arte: 9º ano')
                ->assertSee('SAE - Geografia: 9º ano')
                ->assertSee('SAE - Língua Portuguesa: 9º ano');


        });
    }

    public function testVideoAula_AVA379()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprimario')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->pause(2000);
            $this->browse(function (Browser $browser) {
                $browser->clickLink('FI - Vídeo Aulas / Material Apoio: 2º ano')
                    ->pause(1000)
                    ->clickLink('1. FI - Vídeo Aulas / Material Apoio - 2º ano: Artes')
                    ->pause(1000)
                    ->clickLink('A arte pré-histórica')
                    ->pause(1000)
                    ->click('.vjs-big-play-button')
                    ->whenAvailable('#video_sae_html5_api', function ($video) {
                        $video->assertMissing('.vjs-big-play-button');
                    });
            });

        });
    }

    public function testGabaritoAssuntoNaoExpirado_AVA386()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar');

            $this->browse(function (Browser $browser) {
                $browser->clickLink('SAE - Língua Inglesa: 9º ano')
                    ->clickLink('4. Chinese New Year ')
                    ->pause(1000)
                    ->clickLink('Questão')
                    ->assertMissing('.nomargin.alert.alert-success')
                    ->assertMissing('#pular-questao');
            });

        });
    }

    public function testGabaritoAssuntoExpirado_AVA381()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25103', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaVencida"');
                });
            $this->browse(function (Browser $browser) {
                $browser->clickLink('SAE - Química: 9º ano')
                    ->clickLink('1. Matéria e energia')
                    ->pause(1000)
                    ->clickLink('Questão')
                    ->assertVisible('.nomargin.alert.alert-success')
                    ->click('#pular-questao')
                    ->pause(1000)
                    ->assertVisible('.nomargin.alert.alert-success')
                    ->click('#pular-questao')
                    ->pause(1000)
                    ->assertVisible('.nomargin.alert.alert-success')
                    ->click('#pular-questao')
                    ->pause(1000)
                    ->assertVisible('.nomargin.alert.alert-success');
            });

        });
    }

    public function testVideoExpirado_AVA508()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25103', function ($Disciplina) {
                    $Disciplina->assertSourceHas('class="curso borda6 TarefaVencida"');
                });
            $this->browse(function (Browser $browser) {
                $browser->clickLink('SAE - Química: 9º ano')
                    ->clickLink('1. Matéria e energia')
                    ->visit('curso/sae-quimica-9-ordm-ano/materia-e-energia/00898920220107/2')
                    ->whenAvailable('.esquerda', function ($video) {
                        $video->assertSee('Ops, prazo de atividade expirou!')
                            ->assertSee(' Por esse motivo o percentual assistido não sera computado!');
                    });
            });

        });
    }

    public function testPrimeiroAcessoAVA463()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunotestef1zzz')
                ->value('#senha', 'aluno@saedigital')
                ->click('#btnEntrar');
            $browser->assertSee('Cadastrar Dados Primeiro Login')
                ->assertSee('Nova Senha *')
                ->assertVisible('#salvarPrimeiroLogin');


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
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprimario')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime3ano')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_d9h8')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunolliinha002')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'silva_nnsd')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
                    $Disciplina->assertSeeLink('Áudios - Língua Estrangeira');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#30791', function ($Disciplina) {
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
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprimario')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunoprime3ano')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski_d9h8')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'aluno5anof2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'alunolliinha002')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'silva_nnsd')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
                ->visit('/sair');

            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.boxMeusCursos.sombra.borda8.boxDisciplinas', function ($ListaDisciplinas) {
                    $ListaDisciplinas->assertDontSee('SAE: Arrase no Enem');
                })
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
                ->whenAvailable('#25143', function ($Disciplina) {
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
                ->value('#usuario', 'pedroneffi')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#25103', function ($Disciplina) {
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
