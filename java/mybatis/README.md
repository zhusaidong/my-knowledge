# mybatis

## mybatis-config.xml

mybatis全局配置文件

### 引入外部properties配置

`<properties resource="db.properties"/>`

### mybatis设置项

```xml
<settings>
        <!--字段驼峰映射-->
        <setting name="mapUnderscoreToCamelCase" value="true"/>
        <!--延迟加载，需要时再加载-->
        <setting name="aggressiveLazyLoading" value="false"/>
        <setting name="lazyLoadingEnabled" value="true"/>
    </settings>
```

### bean的别名

```xml
<typeAliases>
        <!--设置单个bean的别名，如果alias不写，默认别名为类名小写-->
        <typeAlias type="com.zhusaidong.mybatis.bean.Employee" alias="Employee"/>
        <!--批量给包下的所有类设置别名-->
        <package name="com.zhusaidong.mybatis.bean"/>
    </typeAliases>
```

也可以在bean中使用注解`@Alias("emp")`起别名

### 环境设置

使用`default`属性切换环境

```xml
<environments default="dev">
   <environment id="prod">
       <transactionManager type="JDBC"/>
       <dataSource type="POOLED">
           <property name="driver" value="${jdbc.prod.driver}"/>
           <property name="url" value="${jdbc.prod.url}"/>
           <property name="username" value="${jdbc.prod.username}"/>
           <property name="password" value="${jdbc.prod.password}"/>
       </dataSource>
   </environment>

   <environment id="dev">
       <transactionManager type="JDBC"/>
       <dataSource type="POOLED">
           <property name="driver" value="${jdbc.dev.driver}"/>
           <property name="url" value="${jdbc.dev.url}"/>
           <property name="username" value="${jdbc.dev.username}"/>
           <property name="password" value="${jdbc.dev.password}"/>
       </dataSource>
   </environment>
</environments>
```

### 注册mapper sql映射文件

```xml
<mappers>
    <!--注册单个mapper xml文件-->
    <mapper resource="com/zhusaidong/mybatis/mapperxml/EmployeeMapper.xml"/>
    <!--注册单个mapper interface文件-->
    <mapper class="com.zhusaidong.mybatis.mapper.EmployeeAnnotationMapper"/>
    <!--
    批量注册包下的interface文件
    对于xmlsql映射文件，需要与接口放在同一目录下，才能被注册（一般在resources文件夹中建相同的包名来放mapper文件）
    -->
    <package name="com.zhusaidong.mybatis.mapper"/>
</mappers>
```

## sql映射文件mapper

### 取值用法

\#{}:相当于使用预编译语句，PreparedStatement

${}:相当于使用Statement,会有sql注入问题

有些情况下需要使用${},如分表时，sql语句需要拼接表名（table_1,table_2）。
因为，PreparedStatement不支持表名预编译

### sql语句的参数

#### 单个参数
    不做特殊处理，#{参数名}，可以取出值
    
#### 多个参数
    做把多个参数封装成map
    key：param1...paramN
    value：传入的参数值
    
#### 命名参数
    使用param1...paramN会很混乱
    所以可以使用注解@Param()来指定参数名称
    这样封装成map时key就是指定名称了
    
#### pojo
    如果传的参数是pojo，可以直接使用其属性值
    
#### Collection（List，Set）或者数组
    也会封装成map
    key：List（list），数组（array）

### resultMap

当要返回的结果集较复杂时可以自定义结果集

```xml
<resultMap id="MyDept" type="com.zhusaidong.mybatis.bean.Department">
    <!--主键列-->
    <id column="id" property="id"/>
    <!--普通字段列-->
    <result column="name" property="name"/>
    <!--返回的结果集中的集合属性,id相同的会合并成集合-->
    <collection property="employees"
                ofType="com.zhusaidong.mybatis.bean.Employee">
        <id column="eid" property="id"/>
        <result column="last_name" property="lastName"/>
        <result column="email" property="email"/>
        <result column="gender" property="gender"/>
    </collection>
    <!--association可以联合javaBean对象-->
    <association property="department"
                 javaType="com.zhusaidong.mybatis.bean.Department">
        <id column="dname" property="name"/>
        <result column="did" property="id"/>
    </association>
    <!--鉴别器，判断某列值改变封装行为，相当于封装结果集时进行if判断-->
    <discriminator column="gender" javaType="int">
        <case value="0">
            <result column="email" property="lastName"/>
        </case>
        <case value="1">
            <result column="last_name" property="lastName"/>
        </case>
    </discriminator>
</resultMap>
```

```xml
<!--resultType:返回结果集类型，可以是结果集对象的别名-->
<select id="getEmpById" resultType="emp">
    select *
    from mybatis.my_employee
    where id = #{id}
</select>
<!--useGeneratedKeys：返回主键值，keyProperty：主键值返回时存放的属性-->
<insert id="addEmp" keyProperty="id" useGeneratedKeys="true">
    insert into mybatis.my_employee (last_name, gender, email)
    VALUES (#{lastName}, #{gender}, #{email})
</insert>
```
