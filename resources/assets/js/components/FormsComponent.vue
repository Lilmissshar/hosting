<template>
	<div class="form-group has-label">
    <label>Address
      <star class="star">*</star>
      <div class="btn btn-primary" v-on:click="addAddress()">Add More</div>
      <div v-for="(address, index) in addresses"> <!-- addresses is the array, address is the object in the addresses together with which index is currently being in use -->
        <textarea class="form-control" name="addresses[]" v-model="address.name"></textarea> <!-- when we send the info, if we put addresses[], it will be informed and sent as an array. address(object).name(variable) v-model : is to place a value to the textbox, and if the value is changed, the v-model will reflect it  -->
        <div class="btn btn-danger" v-on:click="deleteAddress(index)">X</div>
      </div>
    </label>
  </div>
</template>

<script>
  export default {
    data: function(){
      return {
        addresses: [{ //define it as an array with an object which is null initially 
          "name": null
        }]   
      };
    },
  	mounted() {
      console.log("Hello World");
  	},
    methods: {
      addAddress: function(){
        this.addresses.push({ //push is to add in another value, in this case add in a null name variable
          "name": null
      })
      },
      deleteAddress: function(index){
        this.addresses.splice(index, 1); //this is referring to the addresses array at the top from data. splice is to remove one at the index of their choice, which is based on the index key.
      }
    }
}
</script>