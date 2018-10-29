<template>
  <div>


    <v-scale-transition origin="top center">
      <v-flex v-show="show">
        <v-stepper v-model="e1">
          <v-stepper-header>
            <v-stepper-step step="1" :complete="step1Complete" editable>What was fed</v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step step="2" :complete="step2Complete" editable>When was fed</v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step step="3" :complete="step3Complete" editable>Where was fed</v-stepper-step>
            <v-divider></v-divider>
            <v-stepper-step step="4" editable>Summary</v-stepper-step>
          </v-stepper-header>
          <v-stepper-items>
            <v-stepper-content step="1">
              <v-card
                  class="mb-5"
              >
                <v-layout row wrap>
                  <v-flex lg7 xs5>
                    <v-radio-group :mandatory="true" v-model="food_id">
                      <v-radio v-for="(item, index) in food" :key=item.id :value=item.id :label=item.name>
                      </v-radio>
                    </v-radio-group>
                  </v-flex>
                  <v-flex lg4 xs5>
                    <h3>Amount fed</h3>
                    <h5>{{prettyPortion}}</h5>
                    <v-slider class="customSlider" id="portionSlider"
                              v-model="quantity"
                              step="25"
                              min="25"
                              max="400">

                    </v-slider>
                    <v-divider></v-divider>
                    <h3>Number of ducks fed</h3>
                    <h5>{{duck_count}}</h5>
                    <v-slider class="customSlider" id="countSlider"
                              v-model="duck_count"
                              step="1"
                              min="1"
                              max="100">

                    </v-slider>
                  </v-flex>


                </v-layout>
              </v-card>
              <v-btn
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
              >
                <v-layout justify-space-between wrap>
                  <v-flex xs12 sm6 class="my-3">
                    <v-date-picker
                        v-model="date"
                        event-color="green lighten-1"
                    ></v-date-picker>
                  </v-flex>
                  <v-flex xs12 sm6 class="my-3">
                    <v-time-picker v-model="time" color="green lighten-1" header-color="primary"></v-time-picker>

                  </v-flex>
                </v-layout>
              </v-card>
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
              >
                <vuetify-google-autocomplete
                    ref="location"
                    id="map"
                    country="ca"
                    append-icon="search"
                    placeholder="Start typing"
                    v-on:placechanged="getAddressData"
                >
                </vuetify-google-autocomplete>


              </v-card>

              <v-btn
                  color="primary"
                  @click="e1 = 4"
              >
                Continue
              </v-btn>
              <v-btn @click="show = false" flat>Cancel</v-btn>

            </v-stepper-content>

            <v-stepper-content step="4">
              <v-card
                  class="mb-5"
                  color="grey lighten-1"
                  height="200px"
              >
                <v-toolbar color="teal" dark>
                  <v-toolbar-title class="text-xs-center">Summary of Feeding</v-toolbar-title>
                </v-toolbar>

                <v-list subheader>
                  <v-list-tile>
                    <v-list-tile-avatar>
                      <v-icon>gavel</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                      <v-list-tile-title>{{duck_count}} ducks fed</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                  <v-list-tile>
                    <v-list-tile-avatar>
                      <v-icon>gavel</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                      <v-list-tile-title>{{prettyPortion}} of {{food_type}}</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                  <v-list-tile>
                    <v-list-tile-avatar>
                      <v-icon>gavel</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                      <v-list-tile-title>{{date}} at {{time}}</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                  <v-list-tile>
                    <v-list-tile-avatar>
                      <v-icon>gavel</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                      <v-list-tile-title>{{prettyLocation}}</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>

                </v-list>


                <v-divider></v-divider>
              </v-card>

              <v-btn
                  color="primary"
                  @click="save"
              >
                Save
              </v-btn>
              <v-btn @click="show = false" flat>Cancel</v-btn>

            </v-stepper-content>
          </v-stepper-items>


        </v-stepper>
      </v-flex>

    </v-scale-transition>
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
  import * as actions from '../store/action-types'
  import withSnackbar from './mixins/withSnackbar'

  export default {
    mixins: [withSnackbar],

    mounted() {
      console.log('Component mounted.')
    },
    data() {
      return {
        show: false,
        e1: 0,
        quantity: 0,
        duck_count: 0,
        location_id: false,
        location: '',
        food_id: false,
        date: '',
        time: '',
        portionParameters: {
          step: [1, 2, 4, 6, 8]
        }
        
      }
    },
    computed: {
      food: function() {
        return this.$store.state.feeding.foods;
      },
      food_type: function() {
        return this.food_id ? this.food[this.food_id].name : '';
      },
      prettyLocation: function() {
        return this.location ? this.location.name + ' ' + this.location.locality + ' ' + this.location.country : '';
      },
      prettyPortion: function() {
        if (this.food_id === false)
          return '';
        const fraction = this.quantity / 100;
        const parts = fraction.toString().split('.');
        if (parts.length === 1)
          return parts[0] + this.food[this.food_id].portion;
        const prefix = parts[0] === '0' ? '' : parts[0];
        return prefix + ' ' + this.fraction(parts[1]) + this.food[this.food_id].portion;
      },
      step1Complete: function() {
        return this.quantity > 0 && this.food_id !== false && this.duck_count !== 0
      },
      step2Complete: function() {
        return this.date !== '' && this.time !== '';
      },
      step3Complete: function() {
        return (this.location !== '' || this.location_id !== false);
      },
      datetime() {
        return this.date + ' ' + this.time + ':00'
      },


    },
    methods: {
      getAddressData(data) {
        this.location = data;

        console.log(data)

      },
      save() {
        console.log('saving')
        this.$store.dispatch(actions.CREATE_FEEDING, {
          quantity: this.quantity,
          duck_count: this.duck_count,
          location_id: this.location_id,
          location: this.location,
          food_id: this.food_id,
          date: this.datetime,
        }).then(response => {
          this.show = false;
        });

      },

      previousFeedings(date) {
        console.log('prev' + date)
        return true;
      },
      selectFood: function(id) {
        this.food_id = id
      },
      reset: function() {
        this.quantity = 0;
        this.duck_count = false;
        this.location_id = false;
        this.location = '';
        this.food_id = false;
        this.time = false;
      },
      label: function(value) {
        return value;
      },
      fraction: function(value) {
        console.log(value)
        switch(value) {
          case '25':
            return "1/4";
          case '5':
            return "1/2";
          case '75':
            return "3/4";
          default:
            return "";
        }
      }

    }
  }
</script>
