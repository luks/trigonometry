#!/usr/bin/ruby


#Small script used to calculate thumb height so that all thumbs on 
#same line hold aspect ratio but fill up hole area, like google have on image search.
# I got various height of thumbs so first give them desired height,
# then loop  over the thumb doing addition of calculated width untill reach approximately allowed width 
# then I have same height and approx allowed width.
# then calculate angle for hole block 
# then calculate height for allowed width with given angle
# when got it just set it up for thumbs in line, width set to auto, and that is it. 
class Shape



end


class RightTriangle < Shape

	DESIRED_HEIGHT = 30

	ALLOWED_WIDTH = 800

	attr_accessor :height, :width

	def initialize(hash) 
		@height = hash[:height].to_f
		@width = hash[:width].to_f
	end	
    
    #In a right triangle, 
    #the tangent of an angle 
    #is the length of the opposite 
    #side divided by the length of the adjacent side
	def top_angle
		return Math.atan2(@width,@height) * ( 180 / Math::PI )
	end	

	def bottom_angle
		return 90 - top_angle
	end	

	def calculate_width_using_desired_height
		return Math.tan((self.top_angle * 2 * 3.14)/360) * RightTriangle::DESIRED_HEIGHT
	end

	def calculate_shared_top_angle(elements_width)
		return Math.atan2(elements_width, RightTriangle::DESIRED_HEIGHT) * ( 180 / Math::PI )
	end	

	def calculate_shared_bottom_angle(elements_width)
		return 90 - Math.atan2(elements_width, RightTriangle::DESIRED_HEIGHT) * ( 180 / Math::PI )
	end	

	def calculate_shared_height(elements_width)
  		return Math.tan((self.calculate_shared_bottom_angle(elements_width) * 2 * 3.14)/360) * RightTriangle::ALLOWED_WIDTH;
	end	

end


		

@hash = {:height => 40, :width => 50 }

@triangle = RightTriangle.new(@hash)


#puts @triangle.instance_variables

puts @triangle.top_angle
puts @triangle.bottom_angle

puts @triangle.calculate_width_using_desired_height

puts @triangle.calculate_shared_top_angle(400)

puts @triangle.calculate_shared_bottom_angle(400)

puts @triangle.calculate_shared_height(400)



	