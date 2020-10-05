<template>
	<div class="container form-group has-label">
		<label>Keyword available
			<star class="star">*</star>
			<div class="btn btn-primary" v-on:click="addKeyword()">Add More</div>

			<div class="row" v-for="(keyword, index) in keywords">
		      <div class="col-10 pl-3">
		        <input type="text" class="form-control px-4" name="keywords" id="keywords" v-on:keyup="viewKeyword(index)" v-model="keyword.name" autocomplete="off" required>
		        <input type="hidden" name="keyword_id[]" v-model="keyword.id">
		        <ul v-if="keyword.showList" class="team-search-display pl-0">
		          <li v-for="list in lists" v-on:click="keywordOption(list, index)" class="border-bottom-gray px-2 mt-2 text-left">
		            {{ list.name }}
		          </li>
		        </ul>
		      </div>

		      <div class="col-2">
		        <div class="btn btn-info d-inline-block ml-3" v-on:click="deleteKeyword(index)">Remove</div>
		      </div>
		    </div>
	 	</label>
	</div>
</template>

<script>
	export default {
		props: ['propKeyword'],
		data: function() {
			return {
				keywords: [{
					"id": null,
					"name": null,
					"showList": false
				}],
				lists: [],
				clickedData: []
			};
		},
		mounted() {
			if(!this.propKeywords) {
				return;
			}

			this.keywords = JSON.parse(this.propKeywords);
		},
		methods: {
			addKeyword: function() {
				console.log("addKeyword")
				this.keywords.push({
					"id": null,
					"name": null,
					"showList": false
				})
			},
			deleteKeyword: function(index) {
				console.log("delteService")
				this.keywords.splice(index, 1); 
			},
			viewKeyword: function(index) {
				console.log("viewService")
				axios.get('/admin/keywords?' + 'ids=' + JSON.stringify(this.clickedData)) //from array(clickedData) into string
				.then(({ data }) => {
					this.lists = data.rows;
					this.keywords[index].showList = true;
				}) 
			},
			keywordOption: function(list, index) {
				console.log("ServiceOption")
				this.keywords[index].id = list.id;
				this.keywords[index].name = list.name;
				this.clickedData.push(list.id);
				this.keywords[index].showList = false;	
			}//pass in the service as a prop, then check the default function if u have the prop have any value. if not then create, otherwise its edit
		}	
	}
</script>