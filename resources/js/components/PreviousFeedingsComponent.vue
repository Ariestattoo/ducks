<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3>Previous Feedings</h3>
        <v-data-table
            :headers="headers"
            :items="feedings"
            hide-actions
            class="elevation-1"
        >
          <template slot="items" slot-scope="props">
            <td class="text-xs-left">{{ props.item.location }}</td>
            <td class="text-xs-left">{{ props.item.time }}</td>
            <td class="text-xs-left">{{ props.item.food }}</td>
            <td class="text-xs-left">{{ prettyFeeding(props.item.quantity) }}</td>
            <td class="text-xs-left">{{ props.item.portion }}</td>
            <td class="text-xs-left">{{ props.item.duck_count }}</td>
            <td class="text-xs-left">{{ props.item.comment }}</td>
          </template>
        </v-data-table>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        headers: [
          {
            text: 'Location',
            align: 'left',
            value: 'location'
          },
          {
            text: 'Time',
            align: 'left',
            value: 'time'
          },
          {
            text: 'Food',
            align: 'left',
            value: 'food'
          },
          {
            text: 'Quantity',
            align: 'left',
            value: 'quantity'
          },
          {
            text: 'Portion',
            align: 'left',
            value: 'portion'
          },
          {
            text: 'Duck Count',
            align: 'left',
            value: 'duck_count'
          },

          {
            text: 'Comment',
            align: 'left',
            value: 'comment'
          }

        ],
      }
    },

    computed: {
      feedings() {
        return this.$store.state.feeding.feedings;
      },


    },
    methods:{
      prettyFeeding:function(quantity){
        const fraction = quantity / 100;
        const parts = fraction.toString().split('.');
        if (parts.length === 1)
          return parts[0];
        return parts[0] === '0' ? '' : parts[0] + this.fraction(parts[1]);
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
