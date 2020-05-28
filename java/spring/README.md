# ioc容器

```text
//根据xml获取ioc容器
ApplicationContext applicationContext = new ClassPathXmlApplicationContext("beans-spel.xml");
//获取ioc容器里的bean
Car car = (Car) applicationContext.getBean("car");
```

# bean的xml配置

```xml
<beans>
     <!--
    配置bean
        class:bean的全类名，通过反射在容器中创建bean，所以要求bean中必须要有无参构造器
    通过setter方法注入属性
    -->
    <bean id="helloWorld" class="com.zhusaidong.spring.beans.HelloWorld">
        <property name="name" value="Spring"/>
    </bean>
    
    <!--
    通过构造方法注入属性
    多个重载构造方法，可以指定参数类型
    -->
    <bean id="car" class="com.zhusaidong.spring.beans.Car">
        <constructor-arg index="0" type="java.lang.String" value="audi"/>
        <constructor-arg index="1" type="double" value="300000"/>
    </bean>
    
    <!--
    parent:继承
    abstract:抽象bean，不是ioc容器实例化，只能被子bean继承
    depends-on:依赖某个bean
    scope:bean作用域，默认是单例的
    init-method：初始化方法
    destroy-method：销毁方法
    -->
    <!-- 导入外部配置文件 使用：${password} -->
    <context:property-placeholder location="classpath:db.properties"/>
    <!--使用ref属性引用外部bean-->
    <property name="car" ref="car1"/>
    
    <!--使用内部bean-->
    <property name="car">
        <bean class="com.zhusaidong.spring.beans.Car">
            <constructor-arg index="0" type="java.lang.String" value="baoma"/>
            <constructor-arg index="1" type="int" value="240"/>
        </bean>
    </property>
    
    <!--集合属性-->
    <property name="cars">
        <list>
            <ref bean="car1"/>
            <ref bean="car2"/>
        </list>
    </property>
</beans>
```

#spel表达式

使用:`#{语句}`

调用类的静态方法:`#{T(xxxx).xxx()}`

调用类的方法:`#{new xxxx().xxx()}`
