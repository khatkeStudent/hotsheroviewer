function Hero(obj) // CONSTRUCTOR CAN BE OVERLOADED WITH AN OBJECT
{
    this.id = "";
    this.attributeid = "";
	this.name = "";
	this.title = "";
	this.description = "";
	this.icon = "";
	this.role = "";
	this.type = "";
	this.gender = "";
	this.franchise = "";
	this.difficulty = "";
	this.ratings;
	this.releaseDate = "";
	this.stats;
	this.abilities = [];
	this.talents = [];
}

var fooObj = new Foo();

// INITIALISE A NEW FOO AND PASS THE PARSED JSON OBJECT TO IT
var fooJSON = new Foo(JSON.parse('{"a":4,"b":3}'));