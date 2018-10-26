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
            <td class="text-xs-left">{{ props.item.quantity }}</td>
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
      }
    }
  }
</script>
