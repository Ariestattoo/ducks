<template>
  <div>
    <v-layout row justify-center>


      <v-scale-transition  origin="top center">
        <v-flex v-show="show" >
          <v-stepper v-model="e1">
            <v-stepper-header>
              <v-stepper-step step="1" complete>Select campaign settings</v-stepper-step>

              <v-divider></v-divider>

              <v-stepper-step step="2">Create an ad group</v-stepper-step>

              <v-divider></v-divider>

              <v-stepper-step step="3">Create an ad</v-stepper-step>
            </v-stepper-header>
            <v-stepper-items>
              <v-stepper-content step="1">
                <v-card
                    class="mb-5"
                    color="grey lighten-1"
                    height="200px"
                ></v-card>

                <v-btn
                    color="primary"
                    @click="e1 = 2"
                >
                  Continue
                </v-btn>

                <v-btn @click="show = false" flat>Cancel</v-btn>
              </v-stepper-content>

              <v-stepper-content step="2">
                <v-card
                    class="mb-5"
                    color="grey lighten-1"
                    height="200px"
                ></v-card>

                <v-btn
                    color="primary"
                    @click="e1 = 3"
                >
                  Continue
                </v-btn>

                <v-btn @click="show = false" flat>Cancel</v-btn>
              </v-stepper-content>

              <v-stepper-content step="3">
                <v-card
                    class="mb-5"
                    color="grey lighten-1"
                    height="200px"
                ></v-card>

                <v-btn
                    color="primary"
                    @click="e1 = 1"
                >
                  Continue
                </v-btn>
                <v-btn @click="show = false" flat>Cancel</v-btn>

              </v-stepper-content>
            </v-stepper-items>


          </v-stepper>
        </v-flex>

      </v-scale-transition>
    </v-layout>
    <v-btn
        v-show="!show"

        color="primary"
        dark
        @click="show = !show"
    >
      Add Feeding
    </v-btn>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Component mounted.')
    },
    data() {
      return {
        show: false,
        e1: 0
      }
    }
  }
</script>
