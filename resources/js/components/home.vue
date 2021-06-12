<template>
    <div>
      <div class="container">
        <formcomponent @new="addThought"> </formcomponent>
      </div>

      <div class="container">
          <thoughtcomponent
              v-for="(thought, index) in thoughts"
              :key="thought.id"
              :thoughtt="thought"
              @delete="deleteThought(index)"
              @update="updateThought(index, thought)">
          </thoughtcomponent>
      </div>
        {{thoughts}}
        <!-- <div class="container">

           <example @enviandoInfo="traspaso" :ejemplo="ejemplo1">
           </example>
          <h3>resultado desde padre:{{texto2}} </h3>
      </div>-->
    </div>
</template>

<script>

export default {
  name: "home",

  data: () => ({
    ejemplo1: 'si lees esto, funciono!',
    texto2: '',
    texto1: '',
    thoughts:[],
  }),
    mounted() {
      axios.get('/thoughts').then((response) => {
          this.thoughts = response.data;
      });
    },
    methods:{
    addThought(ServerThought){
        this.thoughts.push(ServerThought);
    },
    deleteThought(index){
      this.thoughts.splice(index, 1);
    },
    updateThought(index, thought){
      this.thoughts[index] = thought;
    },
  }
}
</script>

<style scoped>
.container{
  border: 2px silver solid;
  border-radius: 10px;
}
</style>
