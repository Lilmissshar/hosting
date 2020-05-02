<template>
	<div class="form-group has-label">
    <label>Museums
      <star class="star">*</star>
      <div class="btn btn-primary" v-on:click="addMuseum()">Add More</div> <!-- when the button is clicked, it will activate the addMuseum() function -->
      <div v-for="(museum, index) in museums"> <!-- this is a for loop to add more museum of choice. the museums is the array, the museum is the object and the index is which index is being added in or edited in basically  -->
        <textarea class="form-control" name="museums[]" v-model="museum.name" v-on:click="viewMuseum()"></textarea> 
        <!-- the museums[] is used to send in the information as array, the museum is an object and the name is the variable in the object. clicking the box will activate the viewMuseum() function -->
        <input type="hidden" name='museum_ids[]' v-model='museum.id' />
        <div class="btn btn-danger" v-on:click="deleteMuseum(index)">X</div>
        <div v-for="(museumsList, listIndex) in museumsLists"> <!-- another for loop viewing the list of museums when the box is clicked. museumsLists is the array, museumsList is the object and the index of which object is based on the listIndex -->
          <div class="btn btn-outline" v-on:click="museumOption(index, listIndex)"> {{ museumsList.museumName}}</div>
          <!-- museumsOption is a function. index is to determine which box is chosen, listIndex is to determine which museumName is chosen. musemsList.museumName is to show the museumNames available for choosing -->
        </div>
      </div>
    </label>
  </div>
</template>

<script>
   export default {
     data: function(){
       return {
         museums: [{
           "id": null,
           "name": null //the initial box is empty
         }],
         museumsLists: [], //this contains the array for the museums to be chosen
         clickedData: []   //this contains the array for the museums that has been chosen, when the user clicks on a specific museum, the ID of the chosen museum will be stored in this array
       };
   	},
     methods: {
       addMuseum: function(){
         this.museums.push({ //adds in another box which is empty based on the name variable
           "id": null,
           "name": null
       })
       },
       deleteMuseum: function(index){
         this.museums.splice(index, 1); //remove one box when the button is clicked which activates this function. it deletes one index only.
         this.clickedData.splice(index, 1); //remove the clickedData index when the option is deleted (the box is deleted)
      },
     viewMuseum: function(){
      var data = {
        'ids': this.clickedData //place the clicked data into the variable ids
      };

      axios.post('museums', data) //call the museums url, and also the data (which is the clicked data) to send the ids over to the museumservices to be filtered out
      .then(({ data }) => {
        this.museumsLists = data; //this is to show the museum options list 
      })
     },
     museumOption: function(index, listIndex){
      this.museums[index].id = this.museumsLists[listIndex].id; //take the 'id' from the museumsservices transformed data. 
      this.museums[index].name = this.museumsLists[listIndex].museumName; //this is to place the chosen museum into the index (box).
      this.clickedData.push(this.museumsLists[listIndex].id); //put the chosen museum option index into clicked data array
      this.museumsList = []; //make the musuemslist empty when the data has been clicked. 
     }
   }
 }

</script>