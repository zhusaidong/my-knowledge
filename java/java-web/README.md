# servlet

## servlet容器
    运行servlet，filter等的软件环境
    可以创建并调用servlet相关的生命周期的方法。

## HttpServletRequest
    //获取url中?后面的参数
    System.out.println("getQueryString=" + httpServletRequest.getQueryString());
    //获取url中项目根路径(/web)后面的路径
    System.out.println("getPathInfo=" + httpServletRequest.getPathInfo());
    //获取url中根路径(/)后面的路径
    System.out.println("getRequestURI=" + httpServletRequest.getRequestURI());
    //获取url中项目根路径(/web)
    System.out.println("getContextPath=" + httpServletRequest.getContextPath());
    //获取当前url所匹配到的ServletMapping
    HttpServletMapping httpServletMapping = httpServletRequest.getHttpServletMapping();
    //url-pattern中*的内容
    System.out.println("httpServletMapping.getMatchValue=" + httpServletMapping.getMatchValue());
    //匹配到的ServletMapping中的servletName
    System.out.println("httpServletMapping.getServletName=" + httpServletMapping.getServletName());
