<template>
  <div>

    <v-alert elevation="5" class="aviso_componente">componente pensamientos</v-alert>

    <div class="panel-body">
      <div class="panel-heading"> publicado el dia: {{  thoughtt.created_at }}</div>
      <input v-if="editMode" type="text" class="form-control" v-model="thoughtt.description">
      <p v-else> {{thoughtt.description}} </p>
    </div>

    <div class="panel-footer">
      <v-btn v-if="editMode"  v-on:click="onClickUpdate"> Guardar Cambios </v-btn>
      <v-btn v-else  v-on:click="onClickEdit"> Editar </v-btn>
      <v-btn v-on:click="onClickDelete()"> Eliminar </v-btn>
    </div>

  </div>
</template>

<script>
export default {
  name: "thoughtcomponent",

  props: ['thoughtt'],
  data: () => ({
    //
      editMode: false,
      //varthought: this.thoughtt,
  }),
  methods: {
    onClickDelete(){
        axios.delete(`/thoughts/${this.thoughtt.id}`).then(() =>{
            this.$emit("delete");
        });
    },
    onClickEdit(){
      this.editMode = true;
    },
    onClickUpdate(){
        console.log(this.thoughtt);
        axios.put(`/thoughts/${this.thoughtt.id}`, this.thoughtt).then((response) => {
            this.editMode = false;
            const thought = response.data;
            this.$emit("update", thought)
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
