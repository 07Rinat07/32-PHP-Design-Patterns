# 32-PHP-Design-Patterns
## Generative:
1. Singleton
2. Factory
3. Factory_method
4. Static_factory
5. Abstract_factory
6. Builder
7. Prototype
8. Pool
## Structural:
9. Dependency_injection
10. Registry
11. Composite
12. Adapter
13. Bridge
14. Data_mapper
15. Decorator
16. Facade
17. Fluent_interface
18. Flyweight
19. Proxy
## Behavioral:
20. State
21. Strategy
22. Object_null
23. Command
24. Interpreter
25. Specification
26. Chain
27. Iterator
28. Mediator
29. Memento
30. Observer
31. Template_method
32. Visitor

### Multiple Pattern Example and Examples:
### Singleton -->
* это Паттерн проектирования в PHP, который позволяет создать класс таким образом, чтобы у него был только один экземпляр во всем приложении. Это намного упрощает доступ к этому экземпляру и предотвращает создание дублирующих объектов.

Одним из примеров использования паттерна Singleton может быть класс для работы с базой данных. Если вы создадите несколько экземпляров этого класса, то у вас будет множество открытых соединений с базой данных, что может привести к ненужным нагрузкам на ваше приложение.

Вот пример кода класса Singleton в PHP:

php
class Singleton {

    private static $instance;

    private function __construct() {
        // Защищаем от создания через new Singleton
    }

    private function __clone() {
        // Защищаем от создания через клонирование
    }

    private function __wakeup() {
        // Защищаем от создания через unserialize
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function someBusinessLogic() {
        // ...
    }
}

$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();

if ($obj1 === $obj2) {
echo "Singleton работает, оба объекта идентичны";
} else {
echo "Singleton не работает, объекты различны";
}


В этой реализации класса Singleton мы используем закрытые конструктор, клонирование и unserialize, чтобы гарантировать, что не будет создано несколько экземпляров класса. Метод `getInstance()` используется для получения объекта Singleton.

### Factory (фабрика) -->
* это Паттерн проектирования в PHP, который предоставляет средство для создания объектов без указания конкретного класса объекта, который нужно создать. Данный паттерн удобен при работе с большим количеством подклассов, когда необходимость в создании объектов разных классов возникает динамически во время выполнения.

Вот простой пример кода реализации фабрики в PHP:

php
interface Animal {
public function speak();
}

class Dog implements Animal {
public function speak() {
return "Гав-гав!";
}
}

class Cat implements Animal {
public function speak() {
return "Мяу!";
}
}

class AnimalFactory {
public static function create($animalType) {
switch($animalType) {
case "dog":
return new Dog();
break;
case "cat":
return new Cat();
break;
default:
throw new Exception("{$animalType} is unknown animal type");
break;
}
}
}

// Использование фабрики
$dog = AnimalFactory::create("dog");
$cat = AnimalFactory::create("cat");

echo $dog->speak();  // выводит "Гав-гав!"
echo $cat->speak();  // выводит "Мяу!"


В этом примере абстрактный класс `Animal` и два его подкласса `Dog` и `Cat` реализуют метод `speak()`, который возвращает характерный звук для каждого животного. Фабрика `AnimalFactory` определяет метод `create()`, который принимает тип животного в качестве аргумента и возвращает новый объект подкласса `Animal` в зависимости от типа, переданного методу. Код, который использует фабрику, вызывает метод `create()` с нужным типом и сохраняет возвращаемый объект в переменную. Метод `speak()` может быть вызван у объекта, чтобы получить характерный звук животного.

### Dependency injection (DI) -->
* это процесс передачи зависимостей компонента от других компонентов, с целью облегчения их тестирования и повторного использования. В PHP DI часто используется для внедрения зависимостей в конструкторы классов, что упрощает тестирование кода и снижает его связность.

Пример использования DI:


class DatabaseConnection {
private $host;
private $username;
private $password;
private $databaseName;

    public function __construct($host, $username, $password, $databaseName) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    /* Реализация методов работы с базой данных */

}


В примере выше, класс `DatabaseConnection` требует передачи четырех параметров через его конструктор. Таким образом, если другой компонент хочет использовать этот класс, он должен передать все необходимые параметры при создании экземпляра.

С использованием DI мы можем достичь того, чтобы `DatabaseConnection` мог быть инициализирован автоматически:


class SomeClass {
private $db;

    public function __construct(DatabaseConnection $db) {
        $this->db = $db;
    }

    public function doSomething() {
        $this->db->query(...);
    }
}


В примере выше, класс `SomeClass` получает объект `DatabaseConnection` через его конструктор. Это позволяет переиспользовать `SomeClass` независимо от способа создания `DatabaseConnection`.
