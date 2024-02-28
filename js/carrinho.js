$(document).ready(function() {
					var host = "localhost";
					var server = "/aulas/alunos/janine";
					var servico = "ajax-ped.php";

// ###### ADD ################################################################################
	$(".add").find("td a").on('click',  function(e) {
		e.preventDefault();
		//console.log('click ADD / id_produto '+$(this).closest('tr').find('.cod').text()+' | qt '+
		var prod = {};
		prod['id_produto'] = $(this).closest('tr').find('.cod').text();
		prod['qt'] = $(this).closest('tr').find('.quant').val();
		prod['valor'] = parseFloat($(this).closest('tr').find('.valor').text()).toFixed(2);
		prod['descr'] = $(this).closest('tr').find('.nom').text();
		prod['subtot'] = parseFloat(prod['valor']*prod['qt']).toFixed(2);
		prod['acao'] = "add";
		var param='id_produto='+prod['id_produto']+'&qt='+prod['qt']+'&valor='+prod['valor']+'&descr='+prod['descr']+'&acao='+prod['acao'];
//		console.log("http://"+host+server+"/"+servico);
		console.log("Parametros: "+param);
		$.get("http://"+host+server+"/"+servico, param)
			.fail(function(data,status) {
//				console.log('ADD NOK '+data+' S:  '+status);
				console.log('ADD NOK');
			})
			.done(function(data,status) {
				console.log('ADD OK '+data+' S:  '+status);
				var newproduct = '<tr><td class="cod" > '+prod['id_produto']+
					'  </td><td > '+prod['descr'].substr(0,10)+
					' </td><td  class="quant" > '+prod['qt']+' </td><td class="preco" > '+
					prod['valor']+' </td><td class="subtot" > '+prod['subtot']+
					' </td><td class="del" ><button class="btn btn-danger">X</button></td></tr>';

				$("#dados tbody").append( newproduct );
				Total(prod['valor']);
			}); // POST
	}); // ADD
	
// ###### DEL ################################################################################
	$('table').on('click','tr td.del',function(e){
		//e.preventDefault();
		console.log('Deletando...');
		var prod2 = {};
		prod2['id_produto'] = $(this).closest('tr').find('.cod').text();
		prod2['qt'] = $(this).closest('tr').find('.quant').text();
		prod2['valor'] = parseFloat($(this).closest('tr').find('.preco').text()).toFixed(2);
		prod2['descr'] = $(this).closest('tr').find('.nom').text();
		prod2['subtot'] = parseFloat(prod2['valor']*prod2['qt']).toFixed(2);
		prod2['acao'] = "del";
		var param='id_produto='+prod2['id_produto']+'&qt='+prod2['qt']+'&valor='+prod2['valor']+'&acao='+prod2['acao'];
		console.log('click DEL / dados '+param);
		var ret = $.get("http://"+host+server+"/"+servico, param)
			.fail(function(data,status) {
				console.log('DEL NOK '+data+' S:  '+status);
			})
			.done(function(data,status) {
				console.log('DEL OK '+data+' S:  '+status);
				//$(this).closest('tr').remove();
				Total(0);
			}); //POST
			//console.log('Deu? '+ret.statusCode);
			//if (ret.statusCode == '200'){
				$(this).parent("tr").remove()
				//console.log('Deu certo '+ret.statusCode);
				
			//}
	}); // DEL

// ###### RST ################################################################################
$("#rst-cart").on('click',  function(e) {
		e.preventDefault();
		//console.log('click ADD / id_produto '+$(this).closest('tr').find('.cod').text()+' | qt '+
		//var prod = {};
		//prod['acao'] = "rst";
		var param='acao=rst&id_produto=0';
//		console.log("http://"+host+server+"/"+servico);
		console.log("Parametros: "+param);
		$.get("http://"+host+server+"/"+servico, param)
			.fail(function(data,status) {
//				console.log('ADD NOK '+data+' S:  '+status);
				console.log('RST NOK');
			})
			.done(function(data,status) {
				console.log('RST OK '+data+' S:  '+status);
				$("#dados").find("tr:gt(0)").remove();
				Total();
			}); // POST
	}); // RESET

/*function enviaAjax(site,parametros) {
	return $.ajax({
	  type: "POST",
      url: site,
	  data: parametros
  });
}
*/

	function Total(v){
			var soma = 0.0;
			$("#carrinho table .subtot").each(function(e) {
				e.preventDefault;
				var value = $(this).text();
				// add only if the value is number
				if(!isNaN(value) && value.length != 0) {
					v = parseFloat(value);
					soma += v;
				}
			});
			//soma = soma + parseFloat(v);
			console.log('TOTAL: '+soma);
			$('#tot').text('R$ '+parseFloat(soma).toFixed(2));
	}
});
