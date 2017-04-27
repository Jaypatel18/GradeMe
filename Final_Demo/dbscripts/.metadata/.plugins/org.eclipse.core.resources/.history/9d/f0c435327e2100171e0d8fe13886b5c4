package javacon;
import java.sql.*;
import javax.sql.*;

/*@Javadoc
 * @author Tumsa Musa 
 * @date 2/4/2017
 * Connecter connects you to a database*/
public class TestCon {
	String connstring;
	final static String DOMAIN = ".cs.iastate.edu";
	public TestCon() {
		connstring = "proj-309-ss-3";
		/*
		MysqlDataSource dataSource = new MysqlDataSource();
		dataSource.setUser("scott");
		dataSource.setPassword("tiger");
		dataSource.setServerName("myDBHost.example.org");
		*/ 
	}
	
	public void connect(){
		try{  
			Driver c = new com.mysql.jdbc.Driver();  
			Connection con=DriverManager.getConnection(  
			"jdbc:mysql://mysql.cs.iastate.edu:3306/db309ss3","dbu309ss3","MDE1MGYyODVi");  
			//here sonoo is database name, root is username and password  
			if( c.jdbcCompliant())
				System.out.println("did it!");
			
			Statement stmt=con.createStatement();  
			ResultSet rs=stmt.executeQuery("select * from uprofiles");  
			
			while(rs.next())  
			System.out.println(rs.getInt(1)+"  "+rs.getString(2)+"  "+rs.getString(3));  
			
			System.out.println("We did it! : " + con.toString());
			
			con.close();  
			}catch(Exception e){ 
				System.out.println(e);
			}  
	}
	
}
