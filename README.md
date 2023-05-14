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

## Brief description of each Pattern (32Pattern-PHP):
1. Singleton (Одиночка) - это паттерн проектирования, который гарантирует, что класс имеет только один экземпляр, и предоставляет глобальную точку доступа к этому экземпляру. Пример использования: класс для работы с базой данных, который должен иметь только один экземпляр, чтобы избежать конфликтов при работе с данными.
* ingl--> it is a design pattern that ensures that a class has only one instance and provides a global access point to that instance. Usage example: a class for working with a database, which should have only one instance in order to avoid conflicts when working with data.
2. Factory (Фабрика) - это паттерн проектирования, который предоставляет общий интерфейс для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов. Пример использования: класс для создания различных типов продуктов в интернет-магазине.
* it is a design pattern that provides a common interface for creating objects in a superclass, allowing subclasses to change the type of objects they create. Usage example: a class for creating different types of products in an online store.
3. Factory_method (Фабричный метод) - это паттерн проектирования, который определяет интерфейс для создания объектов, но позволяет подклассам выбирать классы, которые должны быть созданы. Пример использования: класс для создания различных типов отчетов в системе управления проектами.
* it is a design pattern that defines an interface for creating objects, but allows subclasses to choose the classes to be created. Usage example: a class for creating various types of reports in a project management system.
4. Static_factory (Статическая фабрика) - это паттерн проектирования, который использует статический метод для создания объектов, вместо создания экземпляра фабрики. Пример использования: класс для создания различных типов логгеров в приложении.
* it's a design pattern that uses a static method to create objects instead of instantiating a factory. Usage example: A class for creating different types of loggers in an application.
5. Abstract_factory (Абстрактная фабрика) - это паттерн проектирования, который предоставляет интерфейс для создания семейств взаимосвязанных объектов без указания их конкретных классов. Пример использования: класс для создания различных типов виджетов в графическом интерфейсе пользователя.
* it is a design pattern that provides an interface for creating families of related objects without specifying their concrete classes. Usage example: A class for creating various types of widgets in a graphical user interface.
6. Builder (Строитель) - это паттерн проектирования, который позволяет создавать сложные объекты пошагово, разделяя процесс создания на отдельные шаги. Пример использования: класс для создания сложных запросов к базе данных.
* it is a design pattern that allows you to create complex objects step by step, dividing the creation process into separate steps. Usage example: a class for creating complex database queries.
7. Prototype (Прототип) - это паттерн проектирования, который позволяет создавать новые объекты путем клонирования существующих объектов, вместо создания новых объектов с нуля. Пример использования: класс для создания копий документов в системе управления документами.
* it is a design pattern that allows you to create new objects by cloning existing objects, instead of creating new objects from scratch. Usage example: A class for making copies of documents in a document management system.
8. Pool (Пул объектов) - это паттерн проектирования, который предоставляет пул объектов для повторного использования, вместо создания новых объектов каждый раз. Пример использования: класс для создания и управления пулом базовых объектов в игре.
* it's a design pattern that provides a pool of objects to reuse instead of creating new objects each time. Usage example: A class for creating and managing a pool of base objects in a game.
9. Dependency_injection (Внедрение зависимостей) - это паттерн проектирования, который позволяет управлять зависимостями между объектами, вместо того, чтобы жестко связывать их в коде. Пример использования: класс для управления зависимостями между компонентами веб-приложения.
* it's a design pattern that allows you to manage dependencies between objects instead of hard-wiring them in code. Usage example: A class for managing dependencies between web application components.
10. Registry (Реестр) - это паттерн проектирования, который позволяет создавать глобальный объект, который может использоваться для хранения и доступа к другим объектам в приложении. Пример: класс Zend_Registry в фреймворке Zend Framework.
* it is a design pattern that allows you to create a global object that can be used to store and access other objects in an application. Example: the Zend_Registry class in the Zend Framework.
11. Composite (Компоновщик) - это паттерн проектирования, который позволяет создавать древовидные структуры объектов, где каждый объект может быть как простым, так и составным. Пример: классы DOMElement и DOMDocument в PHP.
* it is a design pattern that allows you to create tree structures of objects, where each object can be either simple or compound. Example: DOMElement and DOMDocument classes in PHP.
12. Adapter (Адаптер) - это паттерн проектирования, который позволяет использовать объекты с несовместимыми интерфейсами вместе. Пример: классы PDO и mysqli в PHP, которые позволяют работать с разными базами данных через единый интерфейс.
* it is a design pattern that allows objects with incompatible interfaces to be used together. Example: PDO and mysqli classes in PHP that allow you to work with different databases through a single interface.
13. Bridge (Мост) - это паттерн проектирования, который позволяет разделять абстракцию и реализацию, чтобы они могли изменяться независимо друг от друга. Пример: классы Zend_Db_Adapter_Abstract и Zend_Db_Adapter_Mysqli в фреймворке Zend Framework.
* it is a design pattern that allows abstraction and implementation to be separated so that they can change independently of each other. Example: Zend_Db_Adapter_Abstract and Zend_Db_Adapter_Mysqli classes in Zend Framework.
14. Data_mapper (Отображение данных) - это паттерн проектирования, который позволяет отображать данные из базы данных в объекты и наоборот, не связывая объекты с конкретной базой данных. Пример: библиотека Doctrine ORM в PHP.
* it is a design pattern that allows data to be mapped from a database to objects and vice versa without linking the objects to a specific database. Example: Doctrine ORM library in PHP.
15. Decorator (Декоратор) - это паттерн проектирования, который позволяет добавлять новое поведение объектам, не изменяя их исходного кода. Пример: классы Zend_Form_Element и Zend_Form_Decorator в фреймворке Zend Framework.
* it is a design pattern that allows you to add new behavior to objects without changing their source code. Example: Zend_Form_Element and Zend_Form_Decorator classes in the Zend Framework.
16. Facade (Фасад) - это паттерн проектирования, который позволяет создавать упрощенный интерфейс для сложной системы. Пример: классы Zend_Controller_Front и Zend_Controller_Action в фреймворке Zend Framework.
* it is a design pattern that allows you to create a simplified interface for a complex system. Example: Zend_Controller_Front and Zend_Controller_Action classes in the Zend Framework.
17. Fluent_interface (Поточный интерфейс) - это паттерн проектирования, который позволяет создавать цепочки вызовов методов объекта, чтобы упростить и улучшить читаемость кода. Пример: классы Zend_Db_Select и Zend_Form_Element в фреймворке Zend Framework.
* it is a design pattern that allows you to chain calls to object methods to simplify and improve code readability. Example: Zend_Db_Select and Zend_Form_Element classes in Zend Framework.
18. Flyweight (Приспособленец) - это паттерн проектирования, который позволяет экономить память, разделяя общие данные между множеством объектов. Пример: классы SplFixedArray и SplObjectStorage в PHP.
* it is a design pattern that saves memory by sharing common data across multiple objects. Example: SplFixedArray and SplObjectStorage classes in PHP.
19. Proxy (Заместитель) - это паттерн проектирования, который позволяет создавать объект-заместитель для другого объекта, чтобы контролировать доступ к нему. Пример: классы Zend_Acl и Zend_Acl_Resource в фреймворке Zend Framework.
* it is a design pattern that allows you to create a placeholder object for another object in order to control access to it. Example: Zend_Acl and Zend_Acl_Resource classes in Zend Framework.
20. State - это поведенческий паттерн проектирования, который позволяет объекту изменять свое поведение в зависимости от внутреннего состояния. Пример использования: приложение для редактирования текста, где состояние может быть "вставка текста", "выделение текста", "удаление текста" и т.д.
* it is a behavioral design pattern that allows an object to change its behavior depending on its internal state. Usage example: text editing application, where the state could be "insert text", "select text", "delete text", etc.
21. Strategy - это поведенческий паттерн проектирования, который позволяет выбирать алгоритм выполнения задачи в зависимости от контекста. Пример использования: приложение для обработки изображений, где можно выбрать различные алгоритмы обработки в зависимости от типа изображения.
* it is a behavioral design pattern that allows you to choose the algorithm for executing a task depending on the context. Use Case: An image processing application where you can select different processing algorithms depending on the type of image.
22. Object_null - это паттерн проектирования, который позволяет избежать ошибок при работе с объектами, которые могут быть null. Пример использования: приложение для работы с базой данных, где необходимо обрабатывать запросы, которые могут вернуть null.
* it is a design pattern that avoids errors when dealing with objects that can be null. Use Case: A database application that needs to handle queries that might return null.
23. Command - это поведенческий паттерн проектирования, который позволяет инкапсулировать запрос на выполнение определенного действия в виде объекта. Пример использования: приложение для рисования, где каждое действие (например, рисование линии) может быть представлено в виде объекта команды.
* it is a behavioral design pattern that allows you to encapsulate a request to perform a specific action as an object. Usage example: A drawing application where each action (such as drawing a line) can be represented as a command object.
24. Interpreter - это паттерн проектирования, который позволяет интерпретировать язык и выполнять определенные действия в зависимости от входных данных. Пример использования: приложение для обработки математических формул, где формула может быть представлена в виде строки, которую необходимо интерпретировать и вычислить.
* it is a design pattern that allows you to interpret the language and perform certain actions depending on the input. Use case: A mathematical formula processing application where the formula can be represented as a string that needs to be interpreted and calculated.
25. Specification - это паттерн проектирования, который позволяет определять правила для выбора объектов из набора данных. Пример использования: приложение для поиска автомобилей на продажу, где можно задать определенные критерии (например, марка, год выпуска, цена) и получить список подходящих автомобилей.
* it is a design pattern that allows you to define rules for selecting features from a dataset. Usage example: An application for finding cars for sale, where you can set certain criteria (for example, brand, year of manufacture, price) and get a list of suitable cars.
26. Chain - это паттерн проектирования, который позволяет создавать цепочку объектов для обработки запросов. Пример использования: приложение для обработки платежей, где каждый платеж может быть обработан несколькими объектами (например, проверка наличия средств на счете, проверка правильности данных платежа и т.д.).
* it is a design pattern that allows you to create a chain of objects to process requests. Use case: A payment processing application where each payment can be processed by multiple entities (e.g. checking the availability of funds in the account, checking the correctness of the payment data, etc.).
27. Iterator - это поведенческий паттерн, который позволяет последовательно обходить элементы составных объектов, не раскрывая их внутреннего представления. Он предоставляет унифицированный интерфейс для обхода различных типов коллекций.
* it is a behavioral pattern that allows you to sequentially traverse the elements of compound objects without revealing their internal representation. It provides a unified interface for traversing different types of collections.
28. Mediator - это поведенческий паттерн, который позволяет уменьшить связанность между объектами, позволяя им взаимодействовать через централизованный объект-посредник. Это позволяет упростить коммуникацию между объектами и уменьшить зависимости между ними.
* it is a behavioral pattern that allows you to reduce the coupling between objects, allowing them to interact through a centralized proxy object. This simplifies communication between objects and reduces the dependencies between them.
29. Memento - это поведенческий паттерн, который позволяет сохранять и восстанавливать состояние объекта без нарушения инкапсуляции. Он позволяет сохранять состояние объекта в виде объекта-хранителя, который может быть использован для восстановления состояния объекта в будущем.
* it is a behavioral pattern that allows you to save and restore the state of an object without breaking encapsulation. It allows you to save the state of an object as a store object that can be used to restore the state of the object in the future.
30. Observer - это поведенческий паттерн, который позволяет объектам получать уведомления об изменениях состояния других объектов и реагировать на эти изменения. Он позволяет устанавливать связи между объектами, не нарушая их инкапсуляцию, и упрощает коммуникацию между объектами.
* it is a behavioral pattern that allows objects to be notified of changes in the state of other objects and react to those changes. It allows you to establish relationships between objects without breaking their encapsulation, and simplifies communication between objects.
31. Template Method - это поведенческий паттерн, который определяет скелет алгоритма в базовом классе, оставляя реализацию отдельных шагов на усмотрение подклассов. Он позволяет упростить проектирование классов, которые реализуют похожие алгоритмы, и повторно использовать код.
* it is a behavioral pattern that defines the skeleton of an algorithm in a base class, leaving the implementation of the individual steps to subclasses. It allows you to simplify the design of classes that implement similar algorithms and reuse code.
32. Visitor - это поведенческий паттерн, который позволяет добавлять новые операции к объектам без изменения их классов. Он позволяет разделить алгоритмы и структуры данных, упрощает добавление новых операций и улучшает расширяемость системы.
* it is a behavioral pattern that allows you to add new operations to objects without changing their classes. It allows the separation of algorithms and data structures, simplifies the addition of new operations, and improves system extensibility.
