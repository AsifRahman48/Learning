<!DOCTYPE html>
<html>
<body>

<h1 id="demo">My First Web Page</h1>
<p class="pi" id="pi">Hi</p>
<p id="p">My first paragraph.</p>
<p class="p">Hello</p>
<button onclick="fun()"> Print this page</button>


<script>

    document.getElementById('p').remove();

    let p1=document.querySelectorAll('.p');
    p1.forEach(function (list)
    {
        console.log(list);
    });


    function fun(){
    document.getElementById('demo').innerHTML='asif'+ " wow "+ 'rahman';
    document.getElementById('pi').style.color='blue';
       }

 let string="Rahim, Karim, Ali";
    let arr = string.split(', ');
    console.log(Array.isArray(arr));
    console.log(arr);

    console.log();
       const fruits = ['apple','orange','mango'];
    fruits.push('banana');
    fruits.pop();
    console.log(Array.isArray(fruits));
    console.log(arr.indexOf('Ali'));

    const person = {
        firstName: 'Asif',
        lastName: 'Rahman',
        age: 24,
        hobbies: ['Sports','Movies','Music'],
        address: {
            street: 'Nikunja-2',
            city: 'Khelkhet',
            state: 'Dhaka'
        }
    }
    person.email='asif@gmail.com';
    console.log(person.firstName,person.lastName,person.hobbies[0],person.address.state,person.email);

    let todo=[
        {
            id: 1,
            text:'hello',
            isComplete: true
        },
        {
            id: 2,
            text: 'nice',
            isComplete: true
        }
    ];

    todo.forEach(function (todos)
    {
        console.log(todos.id);
    });

    const iscomplete=todo.filter(function (todos)
    {
        return todos.isComplete === true;
    }).map(function (todos){
        return todos.text;
    })
    console.log(iscomplete);

    iscomplete.forEach(function (is){
        console.log(is);
    })

    for(let todos of todo){
        console.log(todos.text)
    }

    for (let i=0; i<todo.length; i++)
    {
        console.log(todo[1].text);
        console.log(`Todos= ${i}`);
    }

    const todoJSON= JSON.stringify(todo);
    console.log();

    for(let x=10; x>0; x--) {
        console.log(`number = ${x}`);
    }

    const x='asif';
    const names= x >'asif' ? 'true':'false';
    console.log(names);

    const name='asif'

    switch (name){
        case 'pavel':
            console.log('i am pavel');
            break;
        case 'abir':
            console.log('i am abir');
            break;
        default:
            console.log('i am asif');
            break;
    }

    function sum(n1,n2){
        return n1*n2;
    }
    console.log(sum(1,1))

    function person111(firstName,lastName,dob) {
            this.firstName= firstName;
            this.lastName=lastName;
            this.dob=new Date(dob);
            this.getBirthYear=function (){
                return this.dob.getFullYear();
            }
            this.getFullName=function (){
                return `${this.firstName} ${this.lastName}`;
            }
    }

    let person1=new person111('asif','rahman','04-02-1999');
    let person2=new person111('abir','rahman','2005');

    console.log(person1.getBirthYear());
    console.log(person1.getFullName());

</script>

</body>
</html>
