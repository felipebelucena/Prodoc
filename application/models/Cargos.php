<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargos
 *
 * @author lfbl
 */
class Application_Model_Cargos {

    

    // aqui será feita as validações para as promoções de cargo.
    // haverá um switch com a variavel $nome, e em cada uma das alternativas
    // será avaliado se dado o cargo atual ($nome), poderá ser feito uma promoção
    // para o cargo subsequente.
    public function achaCargoCorreto($titulo, $cargo, $pontos, $tempoCargoAnterior)
    {
        // se pontos = 0, então o professor é novo, devemos checar qual cargo aceita
        // a sua titulação diretamente sem contar tempo de serviço nem pontuaçaõ
        $novoCargo = null;
        if (!$pontos) {
            switch ($titulo) {
                case 'graduado':
                case 'pós-graduado':
                    $novoCargo = 'Professor Auxiliar';
                    break;

                case 'mestrado' :
                    $novoCargo = 'Professor Assistente I';
                    break;

                case 'doutorado':
                case 'livre-docente':
                    $novoCargo = 'Professor Assistente II';
                    break;
            }
        } else {
            switch ($titulo) {
                case 'pós-graduado':
                    if ($cargo == 'Professor Auxiliar' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 20)
                        $novoCargo = 'Professor Assistente I';

                    elseif ($cargo == 'Professor Assistente' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 30)
                        $novoCargo = 'Professor Assistente II';

                    break;

                case 'mestrado':
                    if ($cargo == 'Professor Assistente I' &&
                            $tempoCargoAnterior >= 2 && $pontos >= 30)
                        $novoCargo = 'Professor Assistente II';

                    elseif ($cargo == 'Professor Assistente II' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 50)
                        $novoCargo = 'Professor Assistente III';

                    elseif ($cargo == 'Professor Assistente III' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 60)
                        $novoCargo = 'Professor Assistente IV';

                    elseif ($cargo == 'Professor Assistente IV' &&
                            $tempoCargoAnterior >= 4 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto I';

                    elseif ($cargo == 'Professor Adjunto I' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto II';

                    break;

                case 'doutorado':
                case 'livre-docente':
                    if ($cargo == 'Professor Assistente II' &&
                            $tempoCargoAnterior >= 2 && $pontos >= 50)
                        $novoCargo = 'Professor Assistente III';

                    elseif ($cargo == 'Professor Assistente III' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 60)
                        $novoCargo = 'Professor Assistente IV';

                    elseif ($cargo == 'Professor Assistente IV' &&
                            $tempoCargoAnterior >= 4 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto I';

                    elseif ($cargo == 'Professor Adjunto I' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto II';

                    elseif ($cargo == 'Professor Adjunto II' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto III';

                    elseif ($cargo == 'Professor Adjunto III' &&
                            $tempoCargoAnterior >= 3 && $pontos >= 150)
                        $novoCargo = 'Professor Adjunto IV';

                    elseif ($cargo == 'Professor Adjunto IV' &&
                            $tempoCargoAnterior >= 6 && $pontos >= 300)
                        $novoCargo = 'Professor Titular';

                    break;
            }
        }
        return $novoCargo;
    }
}
?>
