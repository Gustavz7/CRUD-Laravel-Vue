<template>
    <div class="panel panel-default">

      <v-alert elevation="5" class="aviso_componente">componente formulario</v-alert>

      <div class="panel-heading"> ¿en que estas pensando?</div>
      <div class="panel-body">

        <form action="">
          <label for="thougth"> Ahora estoy pensando en: </label>
          <input type="text" class="form-control" id="thougth" v-model="description">
          <v-btn   elevation="5" v-on:click.prevent="newThought">
            ENVIAR PENSAMIENTO
          </v-btn>
        </form>

      </div>
    </div>

</template>

<script>
export default {
  name: "formcomponent",
  data: () => ({
    //
    description: '',
      descriptions:[]
  }),
  methods: {
      newThought() {
          const params = {
              description: this.description
          };
          this.description = '';
          axios.post('/thoughts', params)
              .then((response) => {
                  const thought = response.data;
                  console.log(response.data)
                  this.$emit('new', thought);
              });
      }
  }
}
</script>

<style scoped>
.form-control {
  border: 2px lightslategray solid;
  border-radius: 10%;
}
</style>

<!--newThought() {
if(this.description.trim() === ''){
alert('Debes completar todos los campos antes de guardar');
return;
}
const NewThougth = this.description;
this.description = '';
axios.post('/thoughts', NewThougth)
.then((res) => {
const ServerThought = res.data;
this.descriptions.push(ServerThought);
this.$emit('new', ServerThought);
});
}-->
