var app = new Vue({
	el:'#home',
	created:function(){

		this.getCategorias();
	
	},

	data:{
        
	lista_categorias:[],
	productos_categoria:[]

    },


	methods:{

	getCategorias(){
	var urlCategorias = '/home/categorias';
		axios.get(urlCategorias).then(response=>{
			this.lista_categorias = response.data;
		});
	},

	obtenerProductosCategoria(categoria){
		console.log("categoria seleccionada", categoria);

		var urlObtenterCategoria = '/home/productoscategoria';

		axios.post(urlObtenterCategoria, categoria ).then(response => {
			this.productos_categoria = response.data
		})
	}

    }

});



