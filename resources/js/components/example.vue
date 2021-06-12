<template>
  <v-container class="grey lighten-5">
    <v-row style="border: 2px">
     <v-col>
       <label for="entrada"> escribir </label>
       <input type="text" id="entrada" v-model="texto1">
       <v-btn v-on:click="enviarInfo" color="success">enviar</v-btn>
     </v-col>
    </v-row>
    <v-row>
      <v-col>
        salida: {{texto1}}
        <br>
        respuesta del prop: {{ejemplo}}
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "example",
  props:['ejemplo'],
  data: () => ({
    texto1: '',
  }),
  methods: {
    enviarInfo(){
      if (!this.texto1 == '') {
        this.$emit("enviandoInfo", this.texto1)
      }
    }
  }
};
</script>

<style scoped>

</style>