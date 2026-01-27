<?php 
@session_start();
$id_usuario = @$_SESSION['id'];
$tabela = 'itens_odo';
require_once("../../../conexao.php");

$id_odo = @$_POST['id'];

if($id_odo == ""){
	$sql_func = " and funcionario = '$id_usuario '";
	
}else{
	$sql_func = " ";	
}

if($id_odo == ""){
	$id_odo = 0;
}


$query = $pdo->query("SELECT * from itens_odo  where odontograma = '$id_odo' $sql_func order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas > 0){
echo <<<HTML
<small>
	<table class="table table-hover table-bordered text-nowrap border-bottom dt-responsive" id="" >
	<thead> 
	<tr> 	
	<th width="8%">Dente</th>	
	<th>Descrição</th>
	<th>Observações</th>		
	<th width="8%">Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;


for($i=0; $i<$linhas; $i++){
	$id = $res[$i]['id'];
	$paciente = $res[$i]['paciente'];
	$data = $res[$i]['data'];
	$dente = $res[$i]['dente'];
	$acao = $res[$i]['acao'];
	$descricao = $res[$i]['descricao'];
	$obs = $res[$i]['obs'];

	 if($acao == "ausentes"){
		  $icone_acao = '<i class="fa fa-circle-o text-white"></i>';
    }else if($acao == "atf"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "atf_tratado"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
	}else if($acao == "cla1"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla1_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla2DO"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla2DO_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla2MO"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla2MO_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla2MOD"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla2MOD_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla3D"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla3D_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla3M"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla3M_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla3MD"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla3MD_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla4"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla4_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "cla5"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "cla5_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "consulta"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "implantes"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "coroa_s_imp"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "coroa_s_imp_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "canal"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "canal_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "nucleo"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "nucleo_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "orto"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "orto_prev"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "orto_prev_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
     }else if($acao == "protese"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "protese_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "pf(3 elem)"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "pf(3 elem)_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "pt"){
		  $icone_acao = '<i class="fa fa-teeth-open text-danger"></i>';
    }else if($acao == "pt_trat"){
		  $icone_acao = '<i class="fa fa-teeth-open text-primary"></i>';
    }else if($acao == "protocolo"){
		  $icone_acao = '<i class="fa fa-circle text-danger"></i>';
    }else if($acao == "protocolo_trat"){
		  $icone_acao = '<i class="fa fa-circle text-primary"></i>';
    }else if($acao == "raiz_res"){
		  $icone_acao = ' <i class="fa fa-close text-dark"></i>';
    }else if($acao == "emergencia"){
		  $icone_acao = ' <i class="fa fa-plus-circle text-danger"></i>';
    }else if($acao == "escovacao"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
    }else if($acao == "faceta"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
     }else if($acao == "faceta_trat"){
		  $icone_acao = ' <i class="fa fa-circle text-dark"></i>';
    }else if($acao == "profilaxia"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
    }else if($acao == "profilaxia_trat"){
		  $icone_acao = ' <i class="fa fa-circle text-primary"></i>';
    }else if($acao == "raspagem"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
    }else if($acao == "raspagem_trat"){
		  $icone_acao = ' <i class="fa fa-circle text-primary"></i>';
    }else if($acao == "rx"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
    }else if($acao == "selante"){
		  $icone_acao = ' <i class="fa fa-circle text-danger"></i>';
    }else if($acao == "selante_trat"){
          $icone_acao = ' <i class="fa fa-circle text-primary"></i>';
    }else if($acao == "incluso"){
		  $icone_acao = ' <i class="fa fa-circle text-dark"></i>';
	}else if($acao == "extrair"){
		  $icone_acao = ' <i class="fa fa-close text-dark"></i>';
	}else if($acao == "extraidos"){
		  $icone_acao = ' <i class="fa fa-circle-o text-white"></i>';
	}
	

		
echo <<<HTML
<tr >

<td style="font-size: 12px !important">
<span>{$icone_acao} {$dente}</span>

<div class="dropdown" style="display: inline-block; margin-left: 10px">                      
                        <a class="" href="#" aria-expanded="false" aria-haspopup="true" data-bs-toggle="dropdown" class="dropdown"><img class="icon-rounded-vermelho" src="img/editar.png" width="15px" height="15px"> </a>
                        <div  class="dropdown-menu tx-13">
                        <div style="width: 240px; padding:15px 5px 0 10px; background: #fcfcf2" class="dropdown-item-text">
                        <p>
                        <big><b>Alterar Procedimento:</b></big> <br>
<br><a title="Em espera" href="#" onclick="editarItem({$id}, 'ausentes')"><span style="color:#2a2b29"><i class="fa fa-circle-o text-white"></i> Ausente</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'atf')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> ATF</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'atf_tratado')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> ATF - Tratado</span></a>

                         <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'consulta')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Consulta Inicial</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla1')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe I</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla1_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe I - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2DO')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe II DO</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2DO_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe II DO - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2MO')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe II MO</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2MO_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe II MO - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2MOD')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe II MOD</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla2MOD_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe II MOD - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3D')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe III D</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3D_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe III D - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3M')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe III M</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3M_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe III M - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3MD')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe III MD</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla3MD_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe III MD - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla4')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe IV</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla4_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe IV - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla5')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Classe V</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'cla5_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Classe V - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'implantes')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Implante</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'coroa_s_imp')"><span style="color:#2a2b29"><i class="fa fa-circle text-daanger"></i> Coroa / Implante</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'coroa_s_imp_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-dark"></i> Implante</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'canal')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Endodontia</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'canal_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Endodontia - Tratado</span></a>

                         <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'nucleo')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Núcleo Preenchimento </span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'nucleo_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Núcleo - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'orto')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Ortodontia</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'orto_prev')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Ortodontia Preventiva</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'orto_prev_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i>Ortodontia Prev - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'emergencia')"><span style="color:#2a2b29"><i class="fa fa-plus-circle text-danger"></i> Emergência</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'protese')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Coroa/Jaqueta/Bloco</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'protese_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i>Coroa/Jaqueta/Bloco - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'pf(3 elem)')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Prótese Fixa (3 elem)</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'pf(3 elem)_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i>PF (3 elem) - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'pt')"><span style="color:#2a2b29"><i class="fa fa-teeth-open text-danger"></i> Prótese Total</span></a>
                       
                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'pt_trat')"><span style="color:#2a2b29"><i class="fa fa-teeth-open text-primary"></i> PT Entregue</span></a>                         
                        
                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'protocolo')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Protocolo</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'protocolo_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Protocolo - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'raiz_res')"><span style="color:#2a2b29"><i class="fa fa-circle text-dark"></i> Raís Residual</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'rx')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Radiologia</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'incluso')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Incluso</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'extraidos')"><span style="color:#2a2b29"><i class="fa fa-circle text-white"></i> Extraído</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'extrair')"><span style="color:#2a2b29"><i class="fa fa-close text-dark"></i> Extraçao Indicada</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'profilaxia')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Profilaxia</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'profilaxia_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Profilaxia - Tratado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'selante')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Selante Oclusal</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'faceta')"><span style="color:#2a2b29"><i class="fa fa-circle text-danger"></i> Faceta</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'faceta_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-dark"></i> Faceta Realizado</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'raspagem')"><span style="color:#2a2b29"><i class="fa fa-circle text-dark"></i> Raspagem e Polimento</span></a>

                        <br><a title="Em espera" href="#" onclick="editarItem({$id}, 'raspagem_trat')"><span style="color:#2a2b29"><i class="fa fa-circle text-primary"></i> Raspagem - Tratado</span></a>
                        <br>

		
                        </p>
                        </div>
                        </div>
                        </div>

</td>

<td style="font-size: 12px !important">
<input style="border:none; border-bottom:1px solid #000; outline:none; background:transparent; width:100%; " id="descricao_{$id}" value="{$descricao}" onblur="editarItem({$id})">
</td>

<td style="font-size: 12px !important">
<input style="border:none; border-bottom:1px solid #000; outline:none; background:transparent; width:100%; " id="obs_{$id}" value="{$obs}" onblur="editarItem({$id})">
</td>
<td>

<div class="dropdown" style="display: inline-block;">                      
                        <a href="#" aria-expanded="false" aria-haspopup="true" data-bs-toggle="dropdown" class="dropdown"><i class="fe fe-trash-2 text-danger"></i> </a>
                        <div  class="dropdown-menu tx-13">
                        <div style="width: 240px; padding:15px 5px 0 10px;" class="dropdown-item-text">
                        <p>Confirmar Exclusão? <a href="#" onclick="excluirProcedimento('{$id}')"><span class="text-danger">Sim</span></a></p>
                        </div>
                        </div>
                        </div>
	
</td>
</tr>
HTML;

}


echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
</small>
HTML;

}else{
	echo '<small>Nenhum Registro Encontrado!</small>';
}

?>




<script type="text/javascript">



	function limparCamposItens(){
		$('#obs').val('');
    	$('#procedimento').val('');    
	}


</script>


<script>
	

	function editarItem(id, acao){

		var descricao = $('#descricao_'+id).val();
		var obs = $('#obs_'+id).val();
		
		 $.ajax({
        url: 'paginas/' + pag + "/editar-item.php",
        method: 'POST',
        data: {id, descricao, obs, acao},
        dataType: "html",

        success:function(mensagem){
        	
            if (mensagem.trim() == "Editado com Sucesso") {  
            	 listarPermanentes();
		           listarDeciduos();
                listarItens();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        }
    });
	}


	function excluirProcedimento(id){
		 $.ajax({
        url: 'paginas/' + pag + "/excluir-item.php",
        method: 'POST',
        data: {id},
        dataType: "html",

        success:function(mensagem){
            if (mensagem.trim() == "Excluído com Sucesso") {   
             listarPermanentes();
		           listarDeciduos();        	
                listarItens();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        }
    });
	}
</script>